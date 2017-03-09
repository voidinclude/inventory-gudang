<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateSalesPriceAPIRequest;
use App\Http\Requests\API\UpdateSalesPriceAPIRequest;
use App\Models\SalesPrice;
use App\Repositories\SalesPriceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class SalesPriceController
 * @package App\Http\Controllers\API
 */

class SalesPriceAPIController extends AppBaseController
{
    /** @var  SalesPriceRepository */
    private $salesPriceRepository;

    public function __construct(SalesPriceRepository $salesPriceRepo)
    {
        $this->salesPriceRepository = $salesPriceRepo;
    }

    /**
     * Display a listing of the SalesPrice.
     * GET|HEAD /salesPrices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesPriceRepository->pushCriteria(new RequestCriteria($request));
        $this->salesPriceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesPrices = $this->salesPriceRepository->all();

        return $this->sendResponse($salesPrices->toArray(), 'Sales Prices retrieved successfully');
    }

    /**
     * Store a newly created SalesPrice in storage.
     * POST /salesPrices
     *
     * @param CreateSalesPriceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateSalesPriceAPIRequest $request)
    {
        $input = $request->all();

        $salesPrices = $this->salesPriceRepository->create($input);

        return $this->sendResponse($salesPrices->toArray(), 'Sales Price saved successfully');
    }

    /**
     * Display the specified SalesPrice.
     * GET|HEAD /salesPrices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var SalesPrice $salesPrice */
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            return $this->sendError('Sales Price not found');
        }

        return $this->sendResponse($salesPrice->toArray(), 'Sales Price retrieved successfully');
    }

    /**
     * Update the specified SalesPrice in storage.
     * PUT/PATCH /salesPrices/{id}
     *
     * @param  int $id
     * @param UpdateSalesPriceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateSalesPriceAPIRequest $request)
    {
        $input = $request->all();

        /** @var SalesPrice $salesPrice */
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            return $this->sendError('Sales Price not found');
        }

        $salesPrice = $this->salesPriceRepository->update($input, $id);

        return $this->sendResponse($salesPrice->toArray(), 'SalesPrice updated successfully');
    }

    /**
     * Remove the specified SalesPrice from storage.
     * DELETE /salesPrices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var SalesPrice $salesPrice */
        $salesPrice = $this->salesPriceRepository->findWithoutFail($id);

        if (empty($salesPrice)) {
            return $this->sendError('Sales Price not found');
        }

        $salesPrice->delete();

        return $this->sendResponse($id, 'Sales Price deleted successfully');
    }
}
