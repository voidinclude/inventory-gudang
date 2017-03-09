<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createpurchase_priceAPIRequest;
use App\Http\Requests\API\Updatepurchase_priceAPIRequest;
use App\Models\purchase_price;
use App\Repositories\purchase_priceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class purchase_priceController
 * @package App\Http\Controllers\API
 */

class purchase_priceAPIController extends AppBaseController
{
    /** @var  purchase_priceRepository */
    private $purchasePriceRepository;

    public function __construct(purchase_priceRepository $purchasePriceRepo)
    {
        $this->purchasePriceRepository = $purchasePriceRepo;
    }

    /**
     * Display a listing of the purchase_price.
     * GET|HEAD /purchasePrices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->purchasePriceRepository->pushCriteria(new RequestCriteria($request));
        $this->purchasePriceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $purchasePrices = $this->purchasePriceRepository->all();

        return $this->sendResponse($purchasePrices->toArray(), 'Purchase Prices retrieved successfully');
    }

    /**
     * Store a newly created purchase_price in storage.
     * POST /purchasePrices
     *
     * @param Createpurchase_priceAPIRequest $request
     *
     * @return Response
     */
    public function store(Createpurchase_priceAPIRequest $request)
    {
        $input = $request->all();

        $purchasePrices = $this->purchasePriceRepository->create($input);

        return $this->sendResponse($purchasePrices->toArray(), 'Purchase Price saved successfully');
    }

    /**
     * Display the specified purchase_price.
     * GET|HEAD /purchasePrices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var purchase_price $purchasePrice */
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            return $this->sendError('Purchase Price not found');
        }

        return $this->sendResponse($purchasePrice->toArray(), 'Purchase Price retrieved successfully');
    }

    /**
     * Update the specified purchase_price in storage.
     * PUT/PATCH /purchasePrices/{id}
     *
     * @param  int $id
     * @param Updatepurchase_priceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatepurchase_priceAPIRequest $request)
    {
        $input = $request->all();

        /** @var purchase_price $purchasePrice */
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            return $this->sendError('Purchase Price not found');
        }

        $purchasePrice = $this->purchasePriceRepository->update($input, $id);

        return $this->sendResponse($purchasePrice->toArray(), 'purchase_price updated successfully');
    }

    /**
     * Remove the specified purchase_price from storage.
     * DELETE /purchasePrices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var purchase_price $purchasePrice */
        $purchasePrice = $this->purchasePriceRepository->findWithoutFail($id);

        if (empty($purchasePrice)) {
            return $this->sendError('Purchase Price not found');
        }

        $purchasePrice->delete();

        return $this->sendResponse($id, 'Purchase Price deleted successfully');
    }
}
