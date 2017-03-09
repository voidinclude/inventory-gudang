<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\produk;
use App\Models\customers;
use App\Models\salesinvoices;
use App\Models\salesorders;
use App\Models\salesorderitem;
use Flash;
use Response;
use DB;
use Auth;
use PDF;

class reportinvoiceController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->limitPaging = '20';
    }

    /**
     * Display a listing of the reportsales.
     *
     */
    public function index()
    {
        return view('reports.salesinvoices');
    }

    public function pagination()
    {
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filtotal = @$_GET['filtotal'];
        $fildisc = @$_GET['fildisc'];
        $filinv = @$_GET['filinv'];
        $filstat = @$_GET['filstat'];

        if(empty($fildate)){

        }
        else{
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['invoiceDate', '=', $fildate];
        }

        $wherein = [];
        if(strlen($filno) > 0) $wherein[] = ['invoiceNo', 'LIKE', '%'.$filno.'%'];
        if(strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%'.$filcust.'%'];
        if(strlen($filtotal) > 0) $wherein[] = ['total', 'LIKE', '%'.$filtotal.'%'];
        if(strlen($fildisc) > 0) $wherein[] = ['discount', 'LIKE', '%'.$fildisc.'%'];
        if(strlen($filinv) > 0) $wherein[] = ['grandtotal', 'LIKE', '%'.$filinv.'%'];
        if(intval($filstat) > 0) $wherein[] = ['status', '=', $filstat];

        if(count($wherein) > 0)
            $invoice = salesinvoices::select()
                ->where($wherein)
                ->paginate($this->limitPaging);
        else
            $invoice = salesinvoices::select()
                ->paginate($this->limitPaging);

        return view('reports.salesinvoiceajax', compact('invoice'));
    }

    public function printReport()
    {
        $no = 1;
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filtotal = @$_GET['filtotal'];
        $fildisc = @$_GET['fildisc'];
        $filinv = @$_GET['filinv'];
        $filstat = @$_GET['filstat'];

        if(empty($fildate)){

        }
        else{
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['invoiceDate', '=', $fildate];
        }

        $wherein = [];
        if(strlen($filno) > 0) $wherein[] = ['invoiceNo', 'LIKE', '%'.$filno.'%'];
        if(strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%'.$filcust.'%'];
        if(strlen($filtotal) > 0) $wherein[] = ['total', 'LIKE', '%'.$filtotal.'%'];
        if(strlen($fildisc) > 0) $wherein[] = ['discount', 'LIKE', '%'.$fildisc.'%'];
        if(strlen($filinv) > 0) $wherein[] = ['grandtotal', 'LIKE', '%'.$filinv.'%'];
        if(intval($filstat) > 0) $wherein[] = ['status', '=', $filstat];

        if(count($wherein) > 0)
            $invoice = salesinvoices::select()
                ->where($wherein)
                ->orderBy('invoiceNo', 'asc')
                ->get();
        else
            $invoice = salesinvoices::select()
                ->orderBy('invoiceNo', 'asc')
                ->get();

        $pdf = PDF::loadView('reports.salesinvoiceprint',compact('invoice', 'no'));
        $pdf->setPaper(array(0,0,500,780), 'landscape');
        return $pdf->stream('report_invoice.pdf');
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
