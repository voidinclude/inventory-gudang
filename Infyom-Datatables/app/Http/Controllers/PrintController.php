<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\salespayments;
use App\Models\salesinvoices;
use App\Models\salesorders;
use PDF;
use DB;
class PrintController extends Controller
{
	public function PrintBuktiPembayaran()
	{
		$no = 1;
        $salespayments = salespayments::all();
        $pdf = PDF::loadView('prints.salespayment',compact('salespayments','no'));
        $pdf->setPaper(array(0,0,400,750), 'landscape');
        return $pdf->stream('all_file_BuktiPembayaran.pdf');
	}
	public function PrintSalesInvoice()
	{
		$no = 1;
        $salesinvoices = salesinvoices::all();
        $pdf = PDF::loadView('prints.salesinvoice',compact('salesinvoices','no'));
        $pdf->setPaper(array(0,0,400,750), 'landscape');
        return $pdf->stream('all_file_BuktiPembayaran.pdf');
	}
	public function PrintSalesOrder()
	{
		$no = 1;
        $salesorders = salesorders::all();
        $pdf = PDF::loadView('prints.salesorder',compact('salesorders','no'));
        $pdf->setPaper(array(0,0,400,750), 'landscape');
        return $pdf->stream('all_file_BuktiPembayaran.pdf');
	}
}
