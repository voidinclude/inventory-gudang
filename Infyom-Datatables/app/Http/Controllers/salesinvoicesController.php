<?php

namespace App\Http\Controllers;

use App\DataTables\salesinvoicesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalesinvoicesRequest;
use App\Http\Requests\UpdatesalesinvoicesRequest;
use App\Repositories\salesinvoicesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Auth;
use PDF;

class salesinvoicesController extends AppBaseController
{
    /** @var  salesinvoicesRepository */
    private $salesinvoicesRepository;

    public function __construct(salesinvoicesRepository $salesinvoicesRepo)
    {
        $this->salesinvoicesRepository = $salesinvoicesRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the salesinvoices.
     *
     * @param salesinvoicesDataTable $salesinvoicesDataTable
     * @return Response
     */
    public function index(salesinvoicesDataTable $salesinvoicesDataTable)
    {
        return $salesinvoicesDataTable->render('salesinvoices.index');
    }

    /**
     * Show the form for creating a new salesinvoices.
     *
     * @return Response
     */
    public function create()
    {
        $soID = @$_GET['soID'];
        if(intval($soID) > 0){

            $today = date('d-m-Y');
            $INV = DB::table('salesinvoices')
            ->where('soID', $soID)
            ->select('id')
            ->get();

            if($INV->count() === 0){

                $SO = DB::table('salesorders')
                ->where('id', $soID)
                ->select('id','soNO', 'customerID', 'customerName', 'customerAddress', 'note')
                ->get()->first();

                $items = DB::table('salesorderitems as soi')
                ->leftJoin('products as pr',  'pr.id', '=', 'soi.productID')
                ->where('soID',$soID)
                ->select('soi.*', 'pr.unit')
                ->orderBy('id', 'asc')->get();

                $exp = explode("/", $SO->soNO);
                $invoiceNo = "INV/" . $exp[1] . "/" . $exp[2];

                $total = 0;
                foreach($items as $rows)
                {
                    $total += ($rows->qty * $rows->price);
                }

                return view('salesinvoices.create', compact('SO', 'items', 'today', 'invoiceNo', 'total'));
            }
            else{
                return redirect(route('salesinvoices.edit', $INV->first()->id));
            }
        }else{
            Flash::error('Silahkan pilih pemesanan terlebih dahulu!');
            return redirect(route('salesinvoices.index'));
        }
    }

    /**
     * Store a newly created salesinvoices in storage.
     *
     * @param CreatesalesinvoicesRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesinvoicesRequest $request)
    {
        $input = $request->all();
        $invoiceDate = $request->input('invoiceDate');
        $invoiceNo = $request->input('invoiceNo');
        $soNo = $request->input('soNo');
        $soID = $request->input('soID');
        $paymentType = $request->input('paymentType');
        $expiredDate = $request->input('expiredDate');
        $customerName = $request->input('customerName');
        $customerID = $request->input('customerID');
        $customerAddress = $request->input('customerAddress');
        $total = $request->input('total');
        $discount = $request->input('discount');
        $grandtotal = $request->input('grandtotal');

        $CEK = DB::table('salesinvoices')
        ->where('invoiceNo', $invoiceNo)
        ->select('id')
        ->get();
        if($CEK->count() === 0) {
            /** save invoice */
            $invID = DB::table('salesinvoices')->insertGetId([
                'invoiceNo' => $invoiceNo,
                'invoiceDate' => $this->convert_date($invoiceDate),
                'soID' => $soID,
                'paymentType' => $paymentType,
                'expiredDate' => ($paymentType === 'term' ? $this->convert_date($expiredDate) : ''),
                'ppn' => '0',
                'total' => $total,
                'discount' => $discount,
                'grandtotal' => $grandtotal,
                'amountPaid' => '0',
                'customerID' => $customerID,
                'customerName' => $customerName,
                'customerAddress' => $customerAddress,
                'status' => '1',
                'staffID' => Auth::user()->id
                ]);

            if (intval($invID) > 0) {
                /** save receive */
                DB::table('receives')->insert([
                    'invoiceID' => $invID,
                    'customerID' => $customerID,
                    'invoiceTotal' => $grandtotal,
                    'receiveTotal' => 0,
                    'refundTotal' => 0,
                    'createdUserID' => Auth::user()->id
                    ]);

                /** update sales order status = 2 */
                DB::table('salesorders')
                ->where('id', $soID)
                ->update(['status' => 2, 'statusText' => 'Sudah Ada Invoice']);

                Flash::success('Faktur penjualan tersimpan.');
                return redirect(route('salesinvoices.index'));
            } else {

                /** hapus invoice */
                DB::table('salesinvoices')->where('id', $invID)->delete();
                Flash::error('Faktur penjualan gagal disimpan!');
                return redirect(route('salesinvoices.create', 'soID=' . $soID));
            }
        }else
        {
            Flash::error('Faktur penjualan sudah ada!');
            return redirect(route('salesinvoices.edit', $CEK->first()->id));
        }
    }

    /**
     * Display the specified salesinvoices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function shows($id)
    {
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            Flash::error('Salesinvoices not found');

            return redirect(route('salesinvoices.index'));
        }

        return view('prints.print_faktur')->with('salesinvoices', $salesinvoices);
    }
    public function show($id)
    {
        /** Cetak PEsanan disini */
        $no = 1;
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            Flash::error('Pesanan tidak ditemukan');

            return redirect(route('salesinvoices.index'));
        }
        $dataPesan = $salesinvoices['attributes'];

        $dataPesan['invoiceDate'] = $this->form_date(@$dataPesan["invoiceDate"]);
        $dataPesan['expiredDate'] = $this->form_date(@$dataPesan["expiredDate"]);
        $dataPesan['soNo'] = '';
        $items = null;
        $SO = DB::table('salesorders')
        ->where('id', $dataPesan['soID'])
        ->select('soNo')
        ->get()->first();

        $dataPesan['soNo'] = $SO->soNo;

        $items = DB::table('salesorderitems as soi')
        ->leftJoin('products as pr', 'pr.id', '=', 'soi.productID')
        ->where('soID', $dataPesan['soID'])
        ->select('soi.*', 'pr.unitText')
        ->orderBy('id', 'asc')->get();

        $jumlah = 0;
                foreach($items as $jmlh)
                {
                    $jumlah = ($jmlh->qty * $jmlh->price);
                }
        
        $pdf = PDF::loadView('prints.print_faktur',compact('jumlah','salesinvoices','SO','dataPesan', 'items','no'));
        $pdf->setPaper(array(0,0,550,780), 'landscape');
        return $pdf->stream('file_INVOICE.pdf');
    }

    /**
     * Show the form for editing the specified salesinvoices.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            Flash::error('Faktur Penjualan tidak ada');
            return redirect(route('salesinvoices.index'));
        }
        $dataPesan = $salesinvoices['attributes'];

        $dataPesan['invoiceDate'] = $this->form_date(@$dataPesan["invoiceDate"]);
        $dataPesan['expiredDate'] = $this->form_date(@$dataPesan["expiredDate"]);
        $dataPesan['soNo'] = '';
        $items = null;

        $PAY = DB::table('paymentdetail')
        ->where('invoiceID', $id)
        ->select('id')
        ->get();

        if($PAY->count() === 0) {
            $disabled = '';
        }else{
            Flash::error('Faktur penjualan sudah memiliki pembayaran, tidak dapat diubah!');
            $disabled = 'disabled="disabled"';
        }
        
        $SO = DB::table('salesorders')
        ->where('id', $dataPesan['soID'])
        ->select('soNo')
        ->get()->first();

        $dataPesan['soNo'] = $SO->soNo;

        $items = DB::table('salesorderitems as soi')
        ->leftJoin('products as pr', 'pr.id', '=', 'soi.productID')
        ->where('soID', $dataPesan['soID'])
        ->select('soi.*', 'pr.unit')
        ->orderBy('id', 'asc')->get();
        return view('salesinvoices.edit', compact('salesinvoices', 'dataPesan', 'items', 'disabled'));
    }

    /**
     * Update the specified salesinvoices in storage.
     *
     * @param  int              $id
     * @param UpdatesalesinvoicesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesinvoicesRequest $request)
    {
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            Flash::error('Faktur Penjualan tidak ditemukan');
            return redirect(route('salesinvoices.index'));
        }

        $input = $request->all();
        $invoiceDate = $request->input('invoiceDate');
        $invoiceNo = $request->input('invoiceNo');
        $soNo = $request->input('soNo');
        $soID = $request->input('soID');
        $paymentType = $request->input('paymentType');
        $expiredDate = $request->input('expiredDate');
        $customerName = $request->input('customerName');
        $customerID = $request->input('customerID');
        $customerAddress = $request->input('customerAddress');
        $total = $request->input('total');
        $discount = $request->input('discount');
        $grandtotal = $request->input('grandtotal');

        /** Update Invoice **/
        DB::table('salesinvoices')->where('id', $id)
        ->update([
            'invoiceNo' => $invoiceNo,
            'invoiceDate' => $this->convert_date($invoiceDate),
            'soID' => $soID,
            'paymentType' => $paymentType,
            'expiredDate' => ($paymentType === 'term' ? $this->convert_date($expiredDate) : ''),
            'ppn' => '0',
            'total' => $total,
            'discount' => $discount,
            'grandtotal' => $grandtotal,
            'customerID' => $customerID,
            'customerName' => $customerName,
            'customerAddress' => $customerAddress,
            'status' => '1',
            'staffID' => Auth::user()->id
            ]);

        /** Update receive **/
        DB::table('receives')->where('invoiceID', $id)
        ->update([
            'customerID' => $customerID,
            'invoiceTotal' => $grandtotal,
            'receiveTotal' => 0,
            'refundTotal' => 0,
            'createdUserID' => Auth::user()->id
            ]);
        Flash::success('Faktur Penjualan berhasil diubah.');
        return redirect(route('salesinvoices.index'));
    }

    /**
     * Remove the specified salesinvoices from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            Flash::error('Salesinvoices not found');

            return redirect(route('salesinvoices.index'));
        }

        $this->salesinvoicesRepository->delete($id);

        Flash::success('Salesinvoices deleted successfully.');

        return redirect(route('salesinvoices.index'));
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
