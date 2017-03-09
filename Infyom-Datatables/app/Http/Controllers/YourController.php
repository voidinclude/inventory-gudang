<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Fpdf;
use App\User;
use App\Models\company;
use App\Models\customers;
use App\Models\factories;
use App\Models\produk;
use App\Models\purchase_price;
use App\Models\receives;
use App\Models\salesorderitem;
use App\Models\salesorders;
use App\Models\salespayments;
use App\Models\SalesPrice;
use App\Models\stock_products;
use App\Models\suppliers;
class YourController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function GeneratePDF()
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML('<h1>Test</h1><hr>');
        return $pdf->stream('file_download.pdf');
    }
    public function printcompanie()
    {
        $namakantor = company::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"DATA PERUSAHAAN",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(20,8,"KODE",1,"","C"); 
        $pdf::cell(40,8,"NAMA",1,"","C"); 
        $pdf::cell(60,8,"KONTAK PERSON",1,"","C");
        $pdf::cell(70,8,"ALAMAT",1,"","C"); 
        $pdf::cell(30,8,"FAX",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($namakantor as $namaperusahaan) 
        {
            $pdf::Cell(10,8,$namaperusahaan->id,12,"","C");
            $pdf::Cell(20,8,$namaperusahaan->companyCode,12,"","C");
            $pdf::Cell(40,8,$namaperusahaan->companyName,12,"","C");
            $pdf::Cell(60,8,$namaperusahaan->contactPerson,12,"","C");
            $pdf::Cell(70,8,$namaperusahaan->address,12,"","C");
            $pdf::Cell(30,8,$namaperusahaan->fax,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printcompanie.pdf','I'); 
        exit;
    }
    public function printcustomer()
    {
        $dataprintcustomer = customers::all();
        $namakantor = company::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"DATA CUSTOMER",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(40,8,"KODE CUSTOMER",1,"","C"); 
        $pdf::cell(28,8,"NAMA",1,"","C"); 
        $pdf::cell(25,8,"TIPE",1,"","C");
        $pdf::cell(40,8,"STATUS",1,"","C"); 
        $pdf::cell(90,8,"NOTE",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataprintcustomer as $customer) 
        {
            $pdf::Cell(10,8,$customer->id,12,"","C");
            $pdf::Cell(40,8,$customer->customerCode,12,"","C");
            $pdf::Cell(28,8,$customer->customerName,12,"","C");
            $pdf::Cell(25,8,$customer->category,12,"","C");
            $pdf::Cell(40,8,$customer->status,12,"","C");
            $pdf::Cell(90,8,$customer->note,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printcustomer.pdf','I'); 
        exit;
    }
    public function printgudang()
    {
        $dataprintfactories = factories::all();
        $namakantor = company::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"DATA GUDANG",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(40,8,"KODE GUDANG",1,"","C"); 
        $pdf::cell(28,8,"NAMA",1,"","C"); 
        $pdf::cell(25,8,"TIPE",1,"","C");
        $pdf::cell(40,8,"STATUS",1,"","C"); 
        $pdf::cell(90,8,"NOTE",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataprintfactories as $factories) 
        {
            $pdf::Cell(10,8,$factories->id,12,"","C");
            $pdf::Cell(40,8,$factories->factoryCode,12,"","C");
            $pdf::Cell(28,8,$factories->factoryName,12,"","C");
            $pdf::Cell(25,8,$factories->factoryType,12,"","C");
            $pdf::Cell(40,8,$factories->status,12,"","C");
            $pdf::Cell(90,8,$factories->note,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printgudang.pdf','I'); 
        exit;
    }
    public function printproduk()
    {
        $dataproducts = produk::all();
        $namakantor = company::all();
        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","R");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"PRODUCTS",0,"","L");
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(40,8,"KODE",1,"","C"); 
        $pdf::cell(90,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(40,8,$products->productCode,1,"","C");
            $pdf::Cell(90,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printproduk.pdf','I'); 
        exit;
    }
    public function printpurchaseprice()
    {
        $dataproducts = products::all();
        $namakantor = company::all();
        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","R");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"PRODUCTS",0,"","L");
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(40,8,"KODE",1,"","C"); 
        $pdf::cell(90,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(40,8,$products->productCode,1,"","C");
            $pdf::Cell(90,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printpurchaseprice.pdf','I'); 
        exit;
    }
    public function printreceives()
    {
        $dataproducts = products::all();
        $namakantor = company::all();
        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","R");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"PRODUCTS",0,"","L");
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(40,8,"KODE",1,"","C"); 
        $pdf::cell(90,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(40,8,$products->productCode,1,"","C");
            $pdf::Cell(90,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printreceives.pdf','I'); 
        exit;
    }
    public function printsalesorderitem()
    {
        $dataproducts = products::all();
        $namakantor = company::all();
        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","R");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"PRODUCTS",0,"","L");
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(40,8,"KODE",1,"","C"); 
        $pdf::cell(90,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(40,8,$products->productCode,1,"","C");
            $pdf::Cell(90,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printsalesorderitem.pdf','I'); 
        exit;
    }
    public function printsalesorder()
    {
        $dataproducts = products::all();
        $namakantor = company::all();
        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","R");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"PRODUCTS",0,"","L");
        $pdf::Ln(); 
        $pdf::SetFont('Arial','B',12); 
        $pdf::cell(40,8,"KODE",1,"","C"); 
        $pdf::cell(90,8,"NAMA",1,"","C"); 
        $pdf::cell(20,8,"UNIT",1,"","C"); 
        $pdf::cell(50,8,"STOCK",1,"","C"); 
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($dataproducts as $products) 
        {
            $pdf::Cell(40,8,$products->productCode,1,"","C");
            $pdf::Cell(90,8,$products->productName,1,"","C");
            $pdf::Cell(20,8,$products->unit,1,"","C");
            $pdf::Cell(50,8,$products->stock,1,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printsalesorder.pdf','I'); 
        exit;
    }
    public function printsalespayment()
    {
        $datasalespayments = salespayments::all();
        $namakantor = company::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"BUKTI PEMBAYARAN",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(40,8,"PEMBAYARAN",1,"","C"); 
        $pdf::cell(25,8,"TGL",1,"","C"); 
        $pdf::cell(25,8,"INVOICE",1,"","C");
        $pdf::cell(40,8,"SURAT JALAN",1,"","C"); 
        $pdf::cell(20,8,"TIPE",1,"","C"); 
        $pdf::cell(25,8,"TOTAL",1,"","C"); 
        $pdf::cell(50,8,"DIBUAT OLEH",1,"","C");
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($datasalespayments as $salespayments) 
        {
            $pdf::Cell(10,8,$salespayments->paymentNo,12,"","C");
            $pdf::Cell(40,8,$salespayments->invoiceID,12,"","C");
            $pdf::Cell(25,8,$salespayments->paymentDate,12,"","C");
            $pdf::Cell(25,8,$salespayments->invoiceID,12,"","C");
            $pdf::Cell(40,8,$salespayments->paymentDate,12,"","C");
            $pdf::Cell(20,8,$salespayments->payType,12,"","C");
            $pdf::Cell(25,8,$salespayments->total,12,"","C");
            $pdf::Cell(50,8,$salespayments->staffName,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printsalespayment.pdf','I'); 
        exit;
    }
    public function printsalesprice()
    {
        $namakantor = company::all();
        $datasalesprice = SalesPrice::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"SALES PRICE",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(60,8,"CUSTOMER ID",1,"","C"); 
        $pdf::cell(40,8,"PRODUCT ID",1,"","C"); 
        $pdf::cell(60,8,"PRODUCT CODE",1,"","C");
        $pdf::cell(60,8,"PRICE",1,"","C");
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($datasalesprice as $namaprice) 
        {
            $pdf::Cell(10,8,$namaprice->id,12,"","C");
            $pdf::Cell(60,8,$namaprice->customerID,12,"","C");
            $pdf::Cell(40,8,$namaprice->productID,12,"","C");
            $pdf::Cell(60,8,$namaprice->productCode,12,"","C");
            $pdf::Cell(60,8,$namaprice->price,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printsalesprice.pdf','I'); 
        exit;
    }
    public function printstokproduct()
    {
        $namakantor = company::all();
        $datasalesprice = SalesPrice::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"SALES PRICE",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(60,8,"CUSTOMER ID",1,"","C"); 
        $pdf::cell(40,8,"PRODUCT ID",1,"","C"); 
        $pdf::cell(60,8,"PRODUCT CODE",1,"","C");
        $pdf::cell(60,8,"PRICE",1,"","C");
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($datasalesprice as $namaprice) 
        {
            $pdf::Cell(10,8,$namaprice->id,12,"","C");
            $pdf::Cell(60,8,$namaprice->customerID,12,"","C");
            $pdf::Cell(40,8,$namaprice->productID,12,"","C");
            $pdf::Cell(60,8,$namaprice->productCode,12,"","C");
            $pdf::Cell(60,8,$namaprice->price,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printstokproduct.pdf','I'); 
        exit;
    }
    public function printsupplier()
    {
        $namakantor = company::all();
        $datasalesprice = SalesPrice::all();

        $pdf = new Fpdf();
        $pdf::SetMargins(2, 4, 11.7);
        $pdf::AddPage('L',array(240, 130)); 
        $pdf::SetFont('Arial','B',20);
        foreach ($namakantor as $namaperusahaan) 
        { 
            $pdf::Cell(0,10,$namaperusahaan->companyName,0,"","L");
        } 
        $pdf::Ln();
        $pdf::SetFont('Arial','B',10);
        $pdf::Cell(0,10,"SALES PRICE",0,"","R");
        $pdf::Ln();
        $pdf::SetFont('Arial','B',12);
        $pdf::cell(10,8,"NO.",1,"","C"); 
        $pdf::cell(60,8,"CUSTOMER ID",1,"","C"); 
        $pdf::cell(40,8,"PRODUCT ID",1,"","C"); 
        $pdf::cell(60,8,"PRODUCT CODE",1,"","C");
        $pdf::cell(60,8,"PRICE",1,"","C");
        $pdf::Ln(); 
        $pdf::SetFont("Arial","",10);
        foreach ($datasalesprice as $namaprice) 
        {
            $pdf::Cell(10,8,$namaprice->id,12,"","C");
            $pdf::Cell(60,8,$namaprice->customerID,12,"","C");
            $pdf::Cell(40,8,$namaprice->productID,12,"","C");
            $pdf::Cell(60,8,$namaprice->productCode,12,"","C");
            $pdf::Cell(60,8,$namaprice->price,12,"","C");
            $pdf::Ln();
        } 
        $pdf::Output('printsupplier.pdf','I'); 
        exit;
    }
}
