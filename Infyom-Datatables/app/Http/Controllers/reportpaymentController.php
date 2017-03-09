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
use App\Models\salespayments;
use Flash;
use Response;
use DB;
use Auth;
use PDF;

class reportpaymentController extends AppBaseController
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
        return view('reports.salespayment');
    }

    public function pagination()
    {
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filtotal = @$_GET['filtotal'];
        $filltype = @$_GET['filltype'];

        if (empty($fildate) || strlen($fildate) < 2) {

        } else {
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['paymentDate', '=', $fildate];
        }

        $wherein = [];
        if (strlen($filno) > 3) $wherein[] = ['paymentNo', 'LIKE', '%' . $filno . '%'];
        if (strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%' . $filcust . '%'];
        if (strlen($filtotal) > 0) $wherein[] = ['total', 'LIKE', '%' . $filtotal . '%'];
        if ($filltype != 'all' && $filltype != '') $wherein[] = ['payType', '=', $filltype];

        if (count($wherein) > 0)
            $payment = salespayments::select()
                ->where($wherein)
                ->paginate($this->limitPaging);
        else
            $payment = salespayments::select()
                ->paginate($this->limitPaging);

        return view('reports.salespaymentajax', compact('payment'));
    }

    public function printReport()
    {
        $no = 1;
        $filno = @$_GET['filno'];
        $fildate = @$_GET['fildate'];
        $filcust = @$_GET['filcust'];
        $filtotal = @$_GET['filtotal'];
        $filltype = @$_GET['filltype'];

        if (empty($fildate) || strlen($fildate) < 2) {

        } else {
            $fildate = $this->convert_date($fildate);
            $wherein[] = ['paymentDate', '=', $fildate];
        }

        $wherein = [];
        if (strlen($filno) > 3) $wherein[] = ['paymentNo', 'LIKE', '%' . $filno . '%'];
        if (strlen($filcust) > 0) $wherein[] = ['customerName', 'LIKE', '%' . $filcust . '%'];
        if (strlen($filtotal) > 0) $wherein[] = ['total', 'LIKE', '%' . $filtotal . '%'];
        if ($filltype != 'all' && $filltype != '') $wherein[] = ['payType', '=', $filltype];

        if (count($wherein) > 0)
            $payment = salespayments::select()
                ->where($wherein)
                ->orderBy('paymentNo', 'asc')
                ->get();
        else
            $payment = salespayments::select()
                ->orderBy('paymentNo', 'asc')
                ->get();

        $pdf = PDF::loadView('reports.salespaymentprint', compact('payment', 'no'));
        $pdf->setPaper(array(0, 0, 500, 780), 'landscape');
        return $pdf->stream('report_payment.pdf');
    }


    /**
     *  Convert date format
     */
    private function convert_date($tanggal = false)
    {
        if (strlen($tanggal) === 10) {
            /** dd-mm-YYYY */
            $dd = substr($tanggal, 0, 2);
            $mm = substr($tanggal, 3, 2);
            $yy = substr($tanggal, -4);
            $current_date = $yy . '-' . $mm . '-' . $dd;
        } else {
            $current_date = '';
        }
        return $current_date;
    }

    /**
     *  Convert date format
     */
    private function form_date($tanggal = false)
    {
        if (strlen($tanggal) > 0 && $tanggal != '0000-00-00 00:00:00') {
            /** dd-mm-YYYY */
            $dd = substr($tanggal, 8, 2);
            $mm = substr($tanggal, 5, 2);
            $yy = substr($tanggal, 0, 4);
            $current_date = $dd . '-' . $mm . '-' . $yy;
        } else {
            $current_date = '';
        }
        return $current_date;
    }
}
