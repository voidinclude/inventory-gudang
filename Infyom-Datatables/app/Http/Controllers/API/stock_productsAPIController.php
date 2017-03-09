<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\Createstock_productsAPIRequest;
use App\Http\Requests\API\Updatestock_productsAPIRequest;
use App\Models\stock_products;
use App\Repositories\stock_productsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class stock_productsController
 * @package App\Http\Controllers\API
 */

class stock_productsAPIController extends AppBaseController
{
    /** @var  stock_productsRepository */
    private $stockProductsRepository;

    public function __construct(stock_productsRepository $stockProductsRepo)
    {
        $this->stockProductsRepository = $stockProductsRepo;
    }

    /**
     * Display a listing of the stock_products.
     * GET|HEAD /stockProducts
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->stockProductsRepository->pushCriteria(new RequestCriteria($request));
        $this->stockProductsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $stockProducts = $this->stockProductsRepository->all();

        return $this->sendResponse($stockProducts->toArray(), 'Stock Products retrieved successfully');
    }

    /**
     * Store a newly created stock_products in storage.
     * POST /stockProducts
     *
     * @param Createstock_productsAPIRequest $request
     *
     * @return Response
     */
    public function store(Createstock_productsAPIRequest $request)
    {
        $input = $request->all();

        $stockProducts = $this->stockProductsRepository->create($input);

        return $this->sendResponse($stockProducts->toArray(), 'Stock Products saved successfully');
    }

    /**
     * Display the specified stock_products.
     * GET|HEAD /stockProducts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var stock_products $stockProducts */
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            return $this->sendError('Stock Products not found');
        }

        return $this->sendResponse($stockProducts->toArray(), 'Stock Products retrieved successfully');
    }

    /**
     * Update the specified stock_products in storage.
     * PUT/PATCH /stockProducts/{id}
     *
     * @param  int $id
     * @param Updatestock_productsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, Updatestock_productsAPIRequest $request)
    {
        $input = $request->all();

        /** @var stock_products $stockProducts */
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            return $this->sendError('Stock Products not found');
        }

        $stockProducts = $this->stockProductsRepository->update($input, $id);

        return $this->sendResponse($stockProducts->toArray(), 'stock_products updated successfully');
    }

    /**
     * Remove the specified stock_products from storage.
     * DELETE /stockProducts/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var stock_products $stockProducts */
        $stockProducts = $this->stockProductsRepository->findWithoutFail($id);

        if (empty($stockProducts)) {
            return $this->sendError('Stock Products not found');
        }

        $stockProducts->delete();

        return $this->sendResponse($id, 'Stock Products deleted successfully');
    }
}
