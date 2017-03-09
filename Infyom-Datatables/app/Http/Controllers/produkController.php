<?php

namespace App\Http\Controllers;

use App\DataTables\produkDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateprodukRequest;
use App\Http\Requests\UpdateprodukRequest;
use App\Repositories\produkRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use DB;
use Auth;

class produkController extends AppBaseController
{
    /** @var  produkRepository */
    private $produkRepository;

    public function __construct(produkRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the produk.
     *
     * @param produkDataTable $produkDataTable
     * @return Response
     */
    public function index(produkDataTable $produkDataTable)
    {
        return $produkDataTable->render('produks.index');
    }

    /**
     * Show the form for creating a new produk.
     *
     * @return Response
     */
    public function create()
    {
        $customer = DB::table('customers')
            ->where('status', 'active')
            ->select('id','customerName')
            ->get();

        return view('produks.create', compact('customer'));
    }

    /**
     * Store a newly created produk in storage.
     *
     * @param CreateprodukRequest $request
     *
     * @return Response
     */
    public function store(CreateprodukRequest $request)
    {
        $cek = DB::table('products')
            ->where('productCode',$request->input('productCode'))
            ->select('id')->get();
        if($cek->count() === 0)
        {
            $newproduk = $id = DB::table('products')->insertGetId(
                ['productCode' => $request->input('productCode'),
                    'productName' => $request->input('productName'),
                    'unit' => $request->input('unit'),
                    'unitText' => ($request->input('unit') == '1'? 'PCS': ($request->input('unit') == '2'? 'SET' : 'LSN')),
                    'status' => $request->input('status')]
            );
            if($newproduk > 0)
            {
                $harga = $request->input('harga');
                $cust = $request->input('custid');
                $dataInsert = [];
                for($k = 0; $k<count($cust); $k++)
                {
                    if($harga[$k] > 0) {
                        $dataInsert[] = array(
                            'customerID' => $cust[$k],
                            'productID' => $id,
                            'productCode' => $request->input('productCode'),
                            'price' => $harga[$k]);
                    }
                }
                if(count($dataInsert) > 0)
                {
                    DB::table('sales_prices')->insert($dataInsert);
                }
            }

            Flash::success('Produk tersimpan.');
            return redirect(route('produks.index'));
        }else
        {
            Flash::error('SKU Sudah ada, silahkan gunakan SKU lain!.');
            return redirect(route('produks.create'));
        }
    }

    /**
     * Display the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        return view('produks.show')->with('produk', $produk);
    }

    /**
     * Show the form for editing the specified produk.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $harga = array();
        $customer = DB::table('customers')
            ->select('id', 'customerName')
            ->get();
        foreach($customer as $customer)
        {
            $cusprice = DB::table('sales_prices')
                ->where('customerID', $customer->id)
                ->where('productID', $id)
                ->select('id', 'price')
                ->get();
            if($cusprice->count() === 0){
                $harga[] = array('customerName' => $customer->customerName, 'customerID' => $customer->id, 'priceID' => '0', 'price' => '0');
            }else{
                $cusprice = $cusprice->first();
                $harga[] = array('customerName' => $customer->customerName, 'customerID' => $customer->id, 'priceID' => $cusprice->id, 'price' => $cusprice->price);
            }
        }
        return view('produks.edit', compact('id', 'produk', 'harga'));
    }

    /**
     * Update the specified produk in storage.
     *
     * @param  int              $id
     * @param UpdateprodukRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprodukRequest $request)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $arProduk = array(
            '_method' => $request->input('_method'),
            '_token' => $request->input('_token'),
            'productCode' => $request->input('productCode'),
            'productName' => $request->input('productName'),
            'unit' => $request->input('unit'),
            'unitText' => ($request->input('unit') == '1'? 'PCS': ($request->input('unit') == '2'? 'SET' : 'LSN')),
            'status' => $request->input('status')
        );
        $update = $this->produkRepository->update($arProduk, $id);

        $harga = $request->input('harga');
        $cust = $request->input('custid');
        $hid = $request->input('priceid');
        $dataInsert = [];
        for($k = 0; $k<count($cust); $k++)
        {
            if($harga[$k] > 0) {
                if ($hid[$k] > 0) {
                    //update
                    DB::table('sales_prices')
                        ->where('id', $hid[$k])
                        ->update(['productCode' => $arProduk['productCode'],'price' => $harga[$k]]);
                } else {
                    //insert
                    $dataInsert[] = array(
                        'customerID' => $cust[$k],
                        'productID' => $id,
                        'productCode' => $arProduk['productCode'],
                        'price' => $harga[$k]);
                }
            }
        }
        if(count($dataInsert) > 0)
        {
            DB::table('sales_prices')->insert($dataInsert);
        }
        Flash::success('Produk berhasil diubah.');
        return redirect(route('produks.index'));
    }

    /**
     * Remove the specified produk from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            Flash::error('Produk tidak ditemukan');

            return redirect(route('produks.index'));
        }

        $this->produkRepository->delete($id);

        Flash::success('Produk berhasil dihapus.');

        return redirect(route('produks.index'));
    }

    public function cekproduct()
    {
        DB::enableQueryLog();
        $code = @$_GET['code'];

        $hasil = DB::table('products')
            ->where('productCode',$code)
            ->select('id')->get();

        $res['total'] = $hasil->count();
        if($hasil->count() === 0){
            $res['message'] = '';
        }else{
            $res['message'] = 'SKU Sudah ada, silahkan gunakan SKU lainya!';
        }

        echo json_encode($res);
        //dd(DB::getQueryLog());
    }
}
