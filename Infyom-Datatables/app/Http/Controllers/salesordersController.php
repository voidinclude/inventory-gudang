<?php

namespace App\Http\Controllers;

use App\DataTables\salesordersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalesordersRequest;
use App\Http\Requests\UpdatesalesordersRequest;
use App\Repositories\salesordersRepository;
use Flash;
use App\Models\salesorders;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Auth;
use PDF;

class salesordersController extends AppBaseController
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /** @var  salesordersRepository */
    private $salesordersRepository;

    public function __construct(salesordersRepository $salesordersRepo)
    {
        $this->salesordersRepository = $salesordersRepo;
        //$this->middleware('auth');
        //$this->middleware('levelakses');
    }

    /**
     * Display a listing of the salesorders.
     *
     * @param salesordersDataTable $salesordersDataTable
     * @return Response
     */
    public function index(salesordersDataTable $salesordersDataTable)
    {
        return $salesordersDataTable->render('salesorders.index');
    }

    /**
     * Show the form for creating a new salesorders.
     *
     * @return Response
     */
    public function create()
    {
        $salesorders = null;
        $dataPesan = array(
            'orderDate' => date('d-m-Y'),
            'needDate' => date('d-m-Y'),
            'soNo' => null,
            'customerName' => null,
            'customerID' => null,
            'customerAddress' => null,
            'note' => null,
        );

        $items = null;
        $disabled = '';
        $action = 'new';
        return view('salesorders.create', compact('salesorders', 'dataPesan', 'items', 'disabled', 'action'));
    }


    /**
     * Store a newly created salesorders in storage.
     *
     * @param CreatesalesordersRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesordersRequest $request)
    {
        $orderDate = $request->input('orderDate');
        $needDate = $request->input('needDate');
        $soNo = $request->input('soNo');
        $customerID = $request->input('customerID');
        $customerName = $request->input('customerLabel');
        $customerAddress = $request->input('customerAddress');
        $itemId = $request->input('item_id');
        $itemName = $request->input('item_name');
        $itemCode = $request->input('item_code');
        $itemPrice = $request->input('item_price');
        $itemQty = $request->input('item_qty');
        $note = @$request->input('note');

        if(count($itemId) > 0)
        {
            /*** cari data staff ***/
            $staffID = Auth::user()->id;
            $staffName = Auth::user()->name;
            /*** cek nomor faktur ***/
            $order = DB::table('salesorders')
                ->where('soNo', $soNo)
                ->select('id')
                ->get();

            if($order->count() === 0)
            {
                $soNo = $soNo;
            }else
            {
                $expCode = explode("/", $soNo);
                $hasil = DB::table('salesorders')
                    ->where('customerID',$customerID)
                    ->select('soNo')
                    ->orderBy('id', 'desc')->limit(1)->get();
                $res = $hasil->first();
                $exp = explode("/", $res->soNo);
                $lastNo = ltrim($exp[2], "0");
                $soNo = "ORD/" . $exp[1] . "/" . str_pad($lastNo+1, 5, "0", STR_PAD_LEFT);
            }


            /*** save sales order ***/
            $soID = DB::table('salesorders')->insertGetId([
                'soNo' => $soNo,
                'customerID' => $customerID,
                'customerName' => $customerName,
                'customerAddress' => $customerAddress,
                'orderDate' => $this->convert_date($orderDate),
                'needDate' => $this->convert_date($needDate),
                'note' => $note,
                'status' => '1',
                'staffID' => $staffID,
                'staffName' => $staffName
            ]);

            if(intval($soID) > 0)
            {
                /** save sales order detail */
                $dataInsert = [];
                for($k = 0; $k<count($itemId); $k++)
                {
                    $dataInsert[] = array('soID' => $soID,
                        'productID' => $itemId[$k],
                        'productName' => $itemName[$k],
                        'sku' => $itemCode[$k],
                        'price' => $itemPrice[$k],
                        'qty' => $itemQty[$k]);
                }
                DB::table('salesorderitems')->insert($dataInsert);

                /*** simpan aksi ke tabel log Admin ***/
                Flash::success('Pesanan tersimpan.');
                return redirect(route('salesorders.index'));
            }else
            {
                /** hapus sales order */
                DB::table('salesorders')->where('id', $soID)->delete();
                Flash::error('Pesanan gagal disimpan!');
            }
        }else
        {
            Flash::error('Silahkan input produk terlebih dahulu!');
        }
    }

    /**
     * Display the specified salesorders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** Cetak PEsanan disini */
        $no = 1;
        $nopro = 1;
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Pesanan tidak ditemukan');

            return redirect(route('salesorders.index'));
        }
         /** items order  **/
        $items = DB::table('salesorderitems as soi')
            ->leftJoin('products as pr',  'pr.id', '=', 'soi.productID')
            ->where('soID',$id)
            ->select('soi.*', 'pr.unitText')
            ->orderBy('id', 'asc')->get();

        $pdf = PDF::loadView('prints.print_salesorder',compact('items','no','salesorders','nopro'));
        $pdf->setPaper(array(0,0,550,780), 'landscape');
        return $pdf->stream('file_SO.pdf');
    }
    public function showB($id) {
        // ambil semua data
        $salesorders = $this->salesordersRepository->findWithoutFail($id);
        if (empty($salesorders)) {
            Flash::error('Pesanan tidak ditemukan');

            return redirect(route('salesorders.index'));
        }
        // mengarahkan view pada file pdf.blade.php di views/provinsi/
        $view = \View::make('salesorders.show', array('salesorders' => $salesorders, 'i' => 0))->render(); 
        // panggil fungsi dompdf
        $pdf = \App::make('dompdf');
        // set ukuran kertas dan orientasi
        $pdf->loadHTML($view);
        // cetak
        return $pdf->stream();
    }

    /**
     * Show the form for editing the specified salesorders.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);
        if (empty($salesorders)) {
            Flash::error('Pesanan tidak ditemukan');

            return redirect(route('salesorders.index'));
        }

        $dataPesan = $salesorders['attributes'];

        $dataPesan['orderDate'] = $this->form_date(@$dataPesan["orderDate"]);
        $dataPesan['needDate'] = $this->form_date(@$dataPesan["needDate"]);

        /** items order  **/
        $items = DB::table('salesorderitems as soi')
            ->leftJoin('products as pr',  'pr.id', '=', 'soi.productID')
            ->where('soID',$id)
            ->select('soi.*', 'pr.unit')
            ->orderBy('id', 'asc')->get();

        /** cari invoice $disabled */
        $inv = DB::table('salesinvoices')
            ->where('soID',$id)
            ->select('id')->get();

        if($inv->count() === 0){
            $disabled = '';
        }
        else{
            $disabled = 'disabled="disabled"';
            Flash::error('Pesanan ini sudah memiliki Invoice, tidak dapat di edit!');
        }
        $action = 'edit';
        return view('salesorders.edit', compact('salesorders', 'dataPesan', 'items', 'disabled', 'action'));
    }

    /**
     * Update the specified salesorders in storage.
     *
     * @param  int              $id
     * @param UpdatesalesordersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesordersRequest $request)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            Flash::error('Pesanan tidak ditemukan!');
            return redirect(route('salesorders.index'));
        }

        $orderDate = $request->input('orderDate');
        $needDate = $request->input('needDate');
        $soNo = $request->input('soNo');
        $customerID = $request->input('customerID');
        $customerName = $request->input('customerLabel');
        $customerAddress = $request->input('customerAddress');
        $itemId = $request->input('item_id');
        $itemName = $request->input('item_name');
        $itemCode = $request->input('item_code');
        $itemPrice = $request->input('item_price');
        $itemQty = $request->input('item_qty');
        $note = @$request->input('note');

        if(count($itemId) > 0)
        {
            /*** cari data staff ***/
            $staffID = Auth::user()->id;
            $staffName = Auth::user()->name;

            /*** update sales order ***/
            DB::table('salesorders')->where('id', $id)
                ->update([
                'soNo' => $soNo,
                'customerID' => $customerID,
                'customerName' => $customerName,
                'customerAddress' => $customerAddress,
                'orderDate' => $this->convert_date($orderDate),
                'needDate' => $this->convert_date($needDate),
                'note' => $note,
                'staffID' => $staffID,
                'staffName' => $staffName
            ]);

            /** hapus tabel sales order items */
            DB::table('salesorderitems')->where('soID', $id)->delete();

            /** save sales order detail */
            $dataInsert = [];
            for($k = 0; $k<count($itemId); $k++)
            {
                $dataInsert[] = array('soID' => $id,
                    'productID' => $itemId[$k],
                    'productName' => $itemName[$k],
                    'sku' => $itemCode[$k],
                    'price' => $itemPrice[$k],
                    'qty' => $itemQty[$k]);
            }
            DB::table('salesorderitems')->insert($dataInsert);

            /*** simpan aksi ke tabel log Admin ***/
            Flash::success('Pesanan tersimpan.');
            return redirect(route('salesorders.index'));

        }else
        {
            Flash::error('Silahkan input produk terlebih dahulu!');
        }

        // insert tabel sales order item yg baru
        /*$salesorders = $this->salesordersRepository->update($request->all(), $id);

        Flash::success('Salesorders updated successfully.');

        return redirect(route('salesorders.index'));*/
    }

    /**
     * Remove the specified salesorders from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesorders = $this->salesordersRepository->findWithoutFail($id);
        if (empty($salesorders)) {
            Flash::error('Pesanan tidak ditemukan');
            return redirect(route('salesorders.index'));
        }

        $inv = DB::table('salesinvoices')
            ->where('soID',$id)
            ->select('id')->get();

        if($inv->count() === 0){

            /** $this->salesordersRepository->delete($id); **/
            DB::table('salesorders')->where('id', $id)->delete();
            DB::table('salesorderitems')->where('soID', $id)->delete();
            Flash::success('Pesanan berhasil dihapus.');
        }
        else{

            Flash::error('Pesanan ini sudah memiliki Invoice, tidak dapat di hapus!');
        }
        return redirect(route('salesorders.index'));
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

        $hasil = DB::table('salesorders')
            ->where('customerID',$custid)
            ->select('soNo')
            ->orderBy('id', 'desc')->limit(1)->get();

        if($hasil->count() === 0)
        {
            $soNo = "ORD/" . $custcode . "/" . str_pad('1', 5, "0", STR_PAD_LEFT);
        }else
        {
            $res = $hasil->first();
            $exp = explode("/", $res->soNo);
            $lastNo = ltrim($exp[2], "0");
            $soNo = "ORD/" . $exp[1] . "/" . str_pad($lastNo+1, 5, "0", STR_PAD_LEFT);
        }
        echo json_encode(array('sono' => $soNo));
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
