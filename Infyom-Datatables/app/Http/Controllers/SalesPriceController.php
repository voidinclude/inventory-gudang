<?php

namespace App\Http\Controllers;

use App\DataTables\SalesPriceDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateSalesPriceRequest;
use App\Http\Requests\UpdateSalesPriceRequest;
use App\Repositories\SalesPriceRepository;
use App\Models\customers;
use App\Models\salesprice;
use App\Models\produk;
use Flash;
use DB;
use App\Http\Controllers\AppBaseController;
use Response;
use Validator;
use Illuminate\Support\Facades\Redirect;

class SalesPriceController extends AppBaseController
{
    /** @var  SalesPriceRepository */
    private $salesPriceRepository;

    public function __construct(SalesPriceRepository $salesPriceRepo)
    {
        $this->salesPriceRepository = $salesPriceRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the SalesPrice.
     *
     * @param SalesPriceDataTable $salesPriceDataTable
     * @return Response
     */
    public function index(SalesPriceDataTable $salesPriceDataTable)
    {
        return $salesPriceDataTable->render('sales_prices.index');
    }

    /**
     * Show the form for creating a new SalesPrice.
     *
     * @return Response
     */
    /*public function create()
    {
        return view('sales_prices.create');
    }*/

    /**
     * Store a newly created SalesPrice in storage.
     *
     * @param CreateSalesPriceRequest $request
     *
     * @return Response
     */
    /*public function store(CreateSalesPriceRequest $request)
    {
        $input = $request->all();

        $salesPrice = $this->salesPriceRepository->create($input);

        Flash::success('Sales Price saved successfully.');

        return redirect(route('salesPrices.index'));
    }
    */

    /**
     * Display the specified SalesPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);
        $datanama = DB::table('sales_prices')
        ->join('customers','sales_prices.customerID','=','customers.id')
        ->select('customers.*','sales_prices.*')
        ->where('sales_prices.id',$id)->get();
        //dd($datanama);
        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        return view('sales_prices.show', compact('salesPrice','datanama'));
    }

    /**
     * Show the form for editing the specified SalesPrice.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerdata = customers::select('id', 'customerCode', 'customerName')
            ->where('id', '=', $id)
            ->get();

        if($customerdata->count() === 0){
            Flash::error('Customer tidak ditemukan!');
            return redirect(route('salesPrices.index'));
        }else{
            $newArray = [];
            $customer = $customerdata->first();
            $data = produk::select(
                'id',
                'productCode',
                'ProductName',
                'unitText'
            )->where('status', '=', 'active')->get();

            $no = 0;
            foreach ($data as $key => $cekout) {
                $sales_prices = salesprice::select(
                    'price',
                    'id'
                )->where('customerID', '=', $customer->id)
                    ->where('productID', '=', $cekout->id)
                    ->get();

                if ($sales_prices->count() === 0) {
                    $newArray[$no]['price'] = '0';
                    $newArray[$no]['priceid'] = '0';
                }else{
                    $sales_prices = $sales_prices->first();
                    $newArray[$no]['price'] = number_format($sales_prices->price, 0,'','');
                    $newArray[$no]['priceid'] = $sales_prices->id;
                }

                $newArray[$no]['produkid'] = $cekout['id'];
                $newArray[$no]['sku'] = $cekout['productCode'];
                $newArray[$no]['nama'] = $cekout['ProductName'];
                $newArray[$no]['satuan'] = $cekout['unitText'];
                $no++;
            }

            return view('sales_prices.edit', compact('customer', 'newArray'));
        }
    }


    /**
     * Update the specified SalesPrice in storage.
     *
     * @param  int              $id
     * @param UpdateSalesPriceRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesPriceRequest $request)
    {
        $customerdata = customers::select('id', 'customerCode', 'customerName')
            ->where('id', '=', $id)
            ->get();

        if($customerdata->count() === 0){
            Flash::error('Customer tidak ditemukan!');
            return redirect(route('salesPrices.index'));
        }else {

            $harga = $request->input('harga');
            $produkid = $request->input('produkid');
            $produkcode = $request->input('produkcode');
            $hargaid = $request->input('hargaid');
            $customerid = $request->input('customerid');

            $insertPrica = [];
            for($k = 0; $k<count($produkid); $k++)
            {
                if($hargaid[$k] > 0)
                {   // update
                    DB::table('sales_prices')
                        ->where('id', '=', $hargaid[$k])
                        ->update([ 'price' => $harga[$k]]);
                }else
                {
                    // insert
                    $insertPrica[] = ['customerID' => $id, 'productID' => $produkid[$k], 'productCode' => $produkcode[$k], 'price' => $harga[$k]];
                }
            }

            if(!empty($insertPrica)){
                DB::table('sales_prices')->insert($insertPrica);
                Flash::success('Harga Produk Tersimpan.');
                return redirect(route('salesPrices.index'));
            }else{
                return back()->with('error','Gagal simpan harga produk.');
            }
        }
    }

    /**
     * Remove the specified SalesPrice from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            Flash::error('Sales Price not found');

            return redirect(route('salesPrices.index'));
        }

        $this->salesPriceRepository->delete($id);

        Flash::success('Sales Price deleted successfully.');

        return redirect(route('salesPrices.index'));
    }
}
