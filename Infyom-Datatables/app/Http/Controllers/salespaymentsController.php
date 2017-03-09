<?php

namespace App\Http\Controllers;

use App\DataTables\salespaymentsDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalespaymentsRequest;
use App\Http\Requests\UpdatesalespaymentsRequest;
use App\Repositories\salespaymentsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Auth;
use Fpdf;
use PDF;
use App\Models\company;
use App\Models\customers;

class salespaymentsController extends AppBaseController
{
    /** @var  salespaymentsRepository */
    private $salespaymentsRepository;

    public function __construct(salespaymentsRepository $salespaymentsRepo)
    {
        $this->salespaymentsRepository = $salespaymentsRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the salespayments.
     *
     * @param salespaymentsDataTable $salespaymentsDataTable
     * @return Response
     */
    public function index(salespaymentsDataTable $salespaymentsDataTable)
    {
        return $salespaymentsDataTable->render('salespayments.index');
    }

    /**
     * Show the form for creating a new salespayments.
     *
     * @return Response
     */
    public function create()
    {
        $tanggal = date('d-m-Y');
        return view('salespayments.create', compact('tanggal'));
    }

    /**
     * Store a newly created salespayments in storage.
     *
     * @param CreatesalespaymentsRequest $request
     *
     * @return Response
     */
    public function store(CreatesalespaymentsRequest $request)
    {
        $input = $request->all();
        $paymentDate = @$request->input('paymentDate');
        $paymentNo = @$request->input('paymentNo');
        $payType = @$request->input('payType');
        $bankNo = @$request->input('bankNo');
        $bankName = @$request->input('bankName');
        $effectiveDate = @$request->input('effectiveDate');
        $bankAC = @$request->input('bankAC');
        $customerID = @$request->input('customerID');
        $customerLabel = @$request->input('customerLabel');
        $customerAddress = @$request->input('customerAddress');
        $note = @$request->input('note');
        $amountpaid = @$request->input('amountpaid');
        $amountid = @$request->input('amountid');
        $totalPaid = @$request->input('totalPaid');

        if($totalPaid > 0)
        {
            /*** cari data staff ***/
            $staffID = Auth::user()->id;
            $staffName = Auth::user()->name;
            /*** cek nomor faktur ***/
            $order = DB::table('salespayments')
            ->where('paymentNo', $paymentNo)
            ->select('id')
            ->get();

            if($order->count() === 0)
            {
                $paymentNo = $paymentNo;
            }else
            {
                $expCode = explode("/", $paymentNo);
                $hasil = DB::table('salespayments')
                ->where('customerID',$customerID)
                ->select('paymentNo')
                ->orderBy('id', 'desc')->limit(1)->get();
                $res = $hasil->first();
                $exp = explode("/", $res->paymentNo);
                $lastNo = ltrim($exp[2], "0");
                $paymentNo = "PAY/" . $exp[1] . "/" . str_pad($lastNo+1, 5, "0", STR_PAD_LEFT);
            }

            /*** save payment ***/
            $paymentID = DB::table('salespayments')->insertGetId([
                'paymentNo' => $paymentNo,
                'customerID' => $customerID,
                'customerName' => $customerLabel,
                'customerAddress' => $customerAddress,
                'paymentDate' => $this->convert_date($paymentDate),
                'effectiveDate' => ($effectiveDate != '' ? $this->convert_date($effectiveDate): date('Y-m-d')),
                'payType' => $payType,
                'bankNo' => $bankNo,
                'bankName' => $bankName,
                'bankAC' => $bankAC,
                'total' => $totalPaid,
                'note' => $note,
                'staffID' => $staffID,
                'staffName' => $staffName
                ]);

            if(intval($paymentID) > 0) {
                /** save sales order detail */
                $dataInsert = [];
                $totalPayment = 0;
                for ($k = 0; $k < count($amountid); $k++) {
                    /** cek invoice **/
                    $invCek = DB::table('salesinvoices')
                        ->where('id', $amountid[$k])
                        ->select('soID', 'invoiceNo', 'amountPaid', 'grandtotal')
                        ->get()->first();

                    if ($amountpaid[$k] > 0) {
                        $dataInsert[] = array('paidID' => $paymentID,
                            'invoiceID' => $amountid[$k],
                            'invoiceNo' => $invCek->invoiceNo,
                            'amountPaid' => $amountpaid[$k]);

                        /** Cek Ptotal Invoice **/
                        if ($invCek->grandtotal <= ($invCek->amountPaid + $amountpaid[$k])) {
                            $invStat = '3';
                            $invStattext = 'Lunas';
                        } else {
                            $invStat = '2';
                            $invStattext = 'Dibayar Sebagian';
                        }

                        /** ubah faktur pemesanan **/
                        DB::table('salesorders')
                            ->where('id', $invCek->soID)
                            ->update(['status' => '3', 'statusText' => 'Sudah Ada Pembayaran']);

                        /** ubah faktur penjualan **/
                        DB::table('salesinvoices')
                            ->where('id', $amountid[$k])
                            ->update(['status' => $invStat, 'statusText' => $invStattext, 'amountPaid' => $invCek->amountPaid + $amountpaid[$k]]);
                        $totalPayment += $amountpaid[$k];
                    }
                }

                if ($totalPayment > 0) {
                    /*** simpan detail pembayaran ***/
                    DB::table('paymentdetail')->insert($dataInsert);

                    /** ubah total pembayaran **/
                    DB::table('salespayments')
                        ->where('id', $paymentID)
                        ->update(['total' => $totalPayment]);

                    /*** simpan aksi ke tabel log Admin ***/
                    Flash::success('Pembayaran tersimpan.');
                    return redirect(route('salespayments.index'));
                } else {
                    /** hapus Pembayaran */
                    DB::table('salespayments')->where('id', $paymentID)->delete();
                    Flash::error('Pembayaran gagal disimpan.');
                    return redirect(route('salespayments.create'));
                }
            }else
            {
                Flash::error('Total Pembayaran tidak boleh "0"');
                return redirect(route('salespayments.create'));
            }
        }else
        {
            Flash::error('Pembayaran gagal disimpan!');
            return redirect(route('salespayments.create'));
        }

        //$salespayments = $this->salespaymentsRepository->create($input);
        //Flash::success('Salespayments saved successfully.');
        //return redirect(route('salespayments.index'));
    }

    /**
     * Display the specified salespayments.
     *
     * @param  int $id
     *
     * @return Response
     */

    public function show($id)
    {
        /** Cetak PEsanan disini */
        $no = 1;
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Pesanan tidak ditemukan');

            return redirect(route('salespayments.index'));
        }

        $paydetail = DB::table('paymentdetail')
            ->where('paidID' , '=', $id)
            ->select('invoiceNo', 'amountPaid')
            ->get();

        $pdf = PDF::loadView('prints.print_buktibayar',compact('salespayments','no', 'paydetail'));
        $pdf->setPaper(array(0,0,500,750), 'landscape');
        return $pdf->stream('file_PAYOUT.pdf');
    }

    /**
     * Show the form for editing the specified salespayments.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Pembayaran tidak ditemukan');

            return redirect(route('salespayments.index'));
        }

        $dataBayar = $salespayments['attributes'];

        $dataBayar['paymentDate'] = $this->form_date(@$dataBayar["paymentDate"]);
        $dataBayar['effectiveDate'] = $this->form_date(@$dataBayar["effectiveDate"]);

        /*** Detail pembayaran ***/
        $detail = DB::table('paymentdetail as paymentdetail')
        ->join('salesinvoices as salesinvoices', 'salesinvoices.id', '=', 'paymentdetail.paidID')
        ->where('paymentdetail.paidID', $id)
        ->select('paymentdetail.*', 'salesinvoices.invoiceNo', 'salesinvoices.grandtotal', 'salesinvoices.amountPaid as totalPaid', 'salesinvoices.invoiceDate')
        ->get();

        return view('salespayments.edit', compact('salespayments', 'dataBayar', 'detail'));
    }

    /**
     * Update the specified salespayments in storage.
     *
     * @param  int              $id
     * @param UpdatesalespaymentsRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalespaymentsRequest $request)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Salespayments not found');

            return redirect(route('salespayments.index'));
        }

        $paymentDate = $request->input('paymentDate');
        $paymentNo = $request->input('paymentNo');
        $payType = $request->input('payType');
        $bankNo = $request->input('bankNo');
        $bankName = $request->input('bankName');
        $effectiveDate = $request->input('effectiveDate');
        $bankAC = $request->input('bankAC');
        $customerID = $request->input('customerID');
        $customerLabel = $request->input('customerLabel');
        $customerAddress = $request->input('customerAddress');
        $note = $request->input('note');
        $amountpaid = $request->input('amountpaid');
        $maountBef = $request->input('maountBef');
        $amountid = $request->input('amountid');
        $detid = $request->input('detid');
        $totalPaid = $request->input('totalPaid');

        /*** cari data staff ***/
        $staffID = Auth::user()->id;
        $staffName = Auth::user()->name;
        
        /** Detail Pembayaran **/
        $dataInsert = [];
        $totalPayment = 0;
        for($k = 0; $k<count($amountid); $k++)
        {   
            /** cek invoice **/
            $invReset = DB::table('salesinvoices')
            ->where('id', $amountid[$k])
            ->select('amountPaid', 'grandtotal')
            ->get()->first();

            /** Ubah amountPayment dari data detail sebelum diubah **/
            $rsetPaid = $invReset->amountPaid - $maountBef[$k];
            $newPaid = $rsetPaid + $amountpaid[$k];
            if($invReset->grandtotal <= $newPaid){
                $newStat = '3'; $newStatText = 'Lunas';
            }else{
                $newStat = '2'; $newStatText = 'Dibayar Sebagian';
            }
            DB::table('salesinvoices')
            ->where('id', $amountid[$k])
            ->update(['amountPaid' => $newPaid, 'status' => $newStat, 'statusText' => $newStatText]);

            /** Update detail pembayaran **/
            DB::table('paymentdetail')
            ->where('id', $detid[$k])
            ->update(['amountPaid' => $amountpaid[$k]]);

            /** hitung total Pembayaran **/
            $totalPayment += $amountpaid[$k];

        }
        
        /** simpan pembayaran **/
        DB::table('salespayments')
        ->where('id', $id)
        ->update(
            [                    
            'paymentDate' => $this->convert_date($paymentDate),
            'effectiveDate' => ($effectiveDate != '' ? $this->convert_date($effectiveDate): date('Y-m-d')),
            'payType' => $payType,
            'bankNo' => $bankNo,
            'bankName' => $bankName,
            'bankAC' => $bankAC,
            'note' => $note,
            'total' => $totalPayment
            ]
            );

        //$salespayments = $this->salespaymentsRepository->update($request->all(), $id);
        Flash::success('Pembayaran berhasil diubah');
        return redirect(route('salespayments.index'));
    }

    /**
     * Remove the specified salespayments from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            Flash::error('Pembayaran tidak ditemukan');

            return redirect(route('salespayments.index'));
        }

        $detail = DB::table('paymentdetail as paymentdetail')
        ->join('salesinvoices as salesinvoices', 'salesinvoices.id', '=', 'paymentdetail.paidID')
        ->where('paymentdetail.paidID', $id)
        ->select('paymentdetail.*', 'salesinvoices.invoiceNo', 'salesinvoices.grandtotal', 'salesinvoices.amountPaid as totalPaid', 'salesinvoices.invoiceDate')
        ->get();
        foreach($detail as $detail)
        {
            /** Ubah amountPayment dari data detail yg dihapus **/
            $newPaid = $detail->totalPaid - $amountPaid;
            if($newPaid == '0'){
                $newStat = '1'; $newStatText = 'Faktur Baru';
            }else{
                $newStat = '2'; $newStatText = 'Dibayar Sebagian';
            }
            DB::table('salesinvoices')
            ->where('id', $detail->invoiceID)
            ->update(['amountPaid' => $newPaid, 'status' => $newStat, 'statusText' => $newStatText]);
        }

        // hapus tabel pembayaran
        DB::table('salespayments')->where('id', $id)->delete();

        // hapus tabel detail pembayaran
        DB::table('paymentdetail')->where('paidID', $id)->delete();

        //$this->salespaymentsRepository->delete($id);
        Flash::success('Pembayaran berhasil dihapus.');

        return redirect(route('salespayments.index'));
    }

        /**
     * Generate Sales Order Number
     *
     * @param  int $customer
     *
     * @return String
     */
        public function ajaxGetNumber()
        {
            $custid = @$_GET["custid"];
            $custcode = @$_GET["custcode"];

            $hasil = DB::table('salespayments')
            ->where('customerID',$custid)
            ->select('paymentNo')
            ->orderBy('id', 'desc')->limit(1)->get();

            if($hasil->count() === 0)
            {
                $faktur = "PAY/" . $custcode . "/" . str_pad('1', 5, "0", STR_PAD_LEFT);
            }else
            {
                $res = $hasil->first();
                $exp = explode("/", $res->paymentNo);
                $lastNo = ltrim($exp[2], "0");
                $faktur = "PAY/" . $exp[1] . "/" . str_pad($lastNo+1, 5, "0", STR_PAD_LEFT);
            }

            $inv = DB::table('salesinvoices')
            ->where('customerID', $custid)
            ->whereColumn('amountPaid', '<', 'grandtotal')
            ->select('*')
            ->orderBy('invoiceNo', 'asc')->get();

            $dataInv = '';
            $totalInv = 0;
            $totalCredit = 0;
            foreach($inv as $inv)
            {
                $dataInv .= '<tr>
                <td class="header">' . $inv->invoiceNo. '</td>
                <td class="header">' . $this->form_date($inv->invoiceDate) . '</td>
                <td class="header">' . number_format($inv->grandtotal). '</td>
                <td class="header">' . number_format($inv->grandtotal - $inv->amountPaid). '</td>
                <td class="header"><input type="text" class="form-control input_price" data-invoice="' . $inv->grandtotal . '" name="amountpaid[]" value="0">
                    <input type="hidden" name="amountid[]" value="' . $inv->id . '" ></td>
                </tr>';            
                $totalInv += $inv->grandtotal;
                $totalCredit += $inv->grandtotal - $inv->amountPaid;
            }

            echo json_encode(array(
                'faktur' => $faktur, 
                'invoices' => $dataInv, 
                'amountInv' => $totalInv, 
                'amountCredit' => $totalCredit
                ));
        }


    /**
     *  Convert date format
     */
    private function convert_date($tanggal = false)
    {
        if(strlen($tanggal) === 10)
        {
            /** dd-mm-YYYY */
            $dd = substr($tanggal, 0, 2);
            $mm = substr($tanggal, 3, 2);
            $yy = substr($tanggal, -4);
            $current_date = $yy . '-' . $mm . '-' . $dd;
        }else
        {
            $current_date = '';
        }
        return $current_date;
    }

    /**
     *  Convert date format
     */
    private function form_date($tanggal = false)
    {
        if(strlen($tanggal) > 0 && $tanggal != '0000-00-00 00:00:00')
        {
            /** dd-mm-YYYY */
            $dd = substr($tanggal, 8, 2);
            $mm = substr($tanggal, 5, 2);
            $yy = substr($tanggal, 0, 4);
            $current_date = $dd . '-' . $mm . '-' . $yy;
        }else
        {
            $current_date = '';
        }
        return $current_date;
    }
}
