<?php

namespace App\Http\Controllers;

use App\DataTables\stock_productsDataTable;
use App\Http\Requests;
use App\Http\Requests\Createstock_productsRequest;
use App\Http\Requests\Updatestock_productsRequest;
use App\Repositories\stock_productsRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class stock_productsController extends AppBaseController
{
    /** @var  stock_productsRepository */
    private $stockProductsRepository;

    public function __construct(stock_productsRepository $stockProductsRepo)
    {
        $this->stockProductsRepository = $stockProductsRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the stock_products.
     *
     * @param stock_productsDataTable $stockProductsDataTable
     * @return Response
     */
    public function index(stock_productsDataTable $stockProductsDataTable)
    {
        return $stockProductsDataTable->render('stock_products.index');
    }

    /**
     * Show the form for creating a new stock_products.
     *
     * @return Response
     */
    public function create()
    {
        return view('stock_products.create');
    }

    /**
     * Store a newly created stock_products in storage.
     *
     * @param Createstock_productsRequest $request
     *
     * @return Response
     */
    public function store(Createstock_productsRequest $request)
    {
        $input = $request->all();

        $stockProducts = $this->stockProductsRepository->create($input);

        Flash::success('Stock Products saved successfully.');

        return redirect(route('stockProducts.index'));
    }

    /**
     * Display the specified stock_products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            Flash::error('Stock Products not found');

            return redirect(route('stockProducts.index'));
        }

        return view('stock_products.show')->with('stockProducts', $stockProducts);
    }

    /**
     * Show the form for editing the specified stock_products.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            Flash::error('Stock Products not found');

            return redirect(route('stockProducts.index'));
        }

        return view('stock_products.edit')->with('stockProducts', $stockProducts);
    }

    /**
     * Update the specified stock_products in storage.
     *
     * @param  int              $id
     * @param Updatestock_productsRequest $request
     *
     * @return Response
     */
    public function update($id, Updatestock_productsRequest $request)
    {
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            Flash::error('Stock Products not found');

            return redirect(route('stockProducts.index'));
        }

        $stockProducts = $this->stockProductsRepository->update($request->all(), $id);

        Flash::success('Stock Products updated successfully.');

        return redirect(route('stockProducts.index'));
    }

    /**
     * Remove the specified stock_products from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            Flash::error('Stock Products not found');

            return redirect(route('stockProducts.index'));
        }

        $this->stockProductsRepository->delete($id);

        Flash::success('Stock Products deleted successfully.');

        return redirect(route('stockProducts.index'));
    }
}
