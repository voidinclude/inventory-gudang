<?php

namespace App\Http\Controllers;

use App\DataTables\purchase_priceDataTable;
use App\Http\Requests;
use App\Http\Requests\Createpurchase_priceRequest;
use App\Http\Requests\Updatepurchase_priceRequest;
use App\Repositories\purchase_priceRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class purchase_priceController extends AppBaseController
{
    /** @var  purchase_priceRepository */
    private $purchasePriceRepository;

    public function __construct(purchase_priceRepository $purchasePriceRepo)
    {
        $this->purchasePriceRepository = $purchasePriceRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the purchase_price.
     *
     * @param purchase_priceDataTable $purchasePriceDataTable
     * @return Response
     */
    public function index(purchase_priceDataTable $purchasePriceDataTable)
    {
        return $purchasePriceDataTable->render('purchase_prices.index');
    }

    /**
     * Show the form for creating a new purchase_price.
     *
     * @return Response
     */
    public function create()
    {
        return view('purchase_prices.create');
    }

    /**
     * Store a newly created purchase_price in storage.
     *
     * @param Createpurchase_priceRequest $request
     *
     * @return Response
     */
    public function store(Createpurchase_priceRequest $request)
    {
        $input = $request->all();

        $purchasePrice = $this->purchasePriceRepository->create($input);

        Flash::success('Purchase Price saved successfully.');

        return redirect(route('purchasePrices.index'));
    }

    /**
     * Display the specified purchase_price.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            Flash::error('Purchase Price not found');

            return redirect(route('purchasePrices.index'));
        }

        return view('purchase_prices.show')->with('purchasePrice', $purchasePrice);
    }

    /**
     * Show the form for editing the specified purchase_price.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            Flash::error('Purchase Price not found');

            return redirect(route('purchasePrices.index'));
        }

        return view('purchase_prices.edit')->with('purchasePrice', $purchasePrice);
    }

    /**
     * Update the specified purchase_price in storage.
     *
     * @param  int              $id
     * @param Updatepurchase_priceRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepurchase_priceRequest $request)
    {
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            Flash::error('Purchase Price not found');

            return redirect(route('purchasePrices.index'));
        }

        $purchasePrice = $this->purchasePriceRepository->update($request->all(), $id);

        Flash::success('Purchase Price updated successfully.');

        return redirect(route('purchasePrices.index'));
    }

    /**
     * Remove the specified purchase_price from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            Flash::error('Purchase Price not found');

            return redirect(route('purchasePrices.index'));
        }

        $this->purchasePriceRepository->delete($id);

        Flash::success('Purchase Price deleted successfully.');

        return redirect(route('purchasePrices.index'));
    }
}
