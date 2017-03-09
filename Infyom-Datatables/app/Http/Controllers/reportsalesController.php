<?php

namespace App\Http\Controllers;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\produk;
use App\Models\customers;
use App\Models\salesorders;
use App\Models\salesorderitem;
use Flash;
use Response;
use DB;
use Auth;
use PDF;

class reportsalesController extends AppBaseController
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
        return view('reports.salesorder');
    }

    public function pagination()
    {
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filstat = @$_GET['filstat'];

        if(empty($fildate)){

        }
        else{
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['orderDate', '=', $fildate];
        }

        $wherein = [];
        if(strlen($filno) > 0) $wherein[] = ['soNo', 'LIKE', '%'.$filno.'%'];
        if(strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%'.$filcust.'%'];
        if(intval($filstat) > 0) $wherein[] = ['status', '=', $filstat];

        if(count($wherein) > 0)
            $orders = salesorders::select()
                ->where($wherein)
                ->paginate($this->limitPaging);
        else
            $orders = salesorders::select()
                ->paginate($this->limitPaging);

        return view('reports.salesorderajax', compact('orders'));
    }

    public function printReport()
    {
        $no = 1;
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filstat = @$_GET['filstat'];

        if(empty($fildate)){

        }
        else{
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['orderDate', '=', $fildate];
        }

        $wherein = [];
        if(strlen($filno) > 0) $wherein[] = ['soNo', 'LIKE', '%'.$filno.'%'];
        if(strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%'.$filcust.'%'];
        if(intval($filstat) > 0) $wherein[] = ['status', '=', $filstat];

        if(count($wherein) > 0)
            $orders = salesorders::select()
                ->where($wherein)
                ->orderBy('soNo', 'asc')
                ->get();
        else
            $orders = salesorders::select()
                ->orderBy('soNo', 'asc')
                ->get();

        $pdf = PDF::loadView('reports.salesorderprint',compact('orders', 'no'));
        $pdf->setPaper(array(0,0,500,780), 'landscape');
        return $pdf->stream('report_so.pdf');
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
