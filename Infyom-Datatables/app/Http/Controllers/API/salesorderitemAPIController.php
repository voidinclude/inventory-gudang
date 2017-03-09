<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesalesorderitemAPIRequest;
use App\Http\Requests\API\UpdatesalesorderitemAPIRequest;
use App\Models\salesorderitem;
use App\Repositories\salesorderitemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class salesorderitemController
 * @package App\Http\Controllers\API
 */

class salesorderitemAPIController extends AppBaseController
{
    /** @var  salesorderitemRepository */
    private $salesorderitemRepository;

    public function __construct(salesorderitemRepository $salesorderitemRepo)
    {
        $this->salesorderitemRepository = $salesorderitemRepo;
    }

    /**
     * Display a listing of the salesorderitem.
     * GET|HEAD /salesorderitems
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesorderitemRepository->pushCriteria(new RequestCriteria($request));
        $this->salesorderitemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesorderitems = $this->salesorderitemRepository->all();

        return $this->sendResponse($salesorderitems->toArray(), 'Salesorderitems retrieved successfully');
    }

    /**
     * Store a newly created salesorderitem in storage.
     * POST /salesorderitems
     *
     * @param CreatesalesorderitemAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesorderitemAPIRequest $request)
    {
        $input = $request->all();

        $salesorderitems = $this->salesorderitemRepository->create($input);

        return $this->sendResponse($salesorderitems->toArray(), 'Salesorderitem saved successfully');
    }

    /**
     * Display the specified salesorderitem.
     * GET|HEAD /salesorderitems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var salesorderitem $salesorderitem */
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            return $this->sendError('Salesorderitem not found');
        }

        return $this->sendResponse($salesorderitem->toArray(), 'Salesorderitem retrieved successfully');
    }

    /**
     * Update the specified salesorderitem in storage.
     * PUT/PATCH /salesorderitems/{id}
     *
     * @param  int $id
     * @param UpdatesalesorderitemAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesorderitemAPIRequest $request)
    {
        $input = $request->all();

        /** @var salesorderitem $salesorderitem */
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            return $this->sendError('Salesorderitem not found');
        }

        $salesorderitem = $this->salesorderitemRepository->update($input, $id);

        return $this->sendResponse($salesorderitem->toArray(), 'salesorderitem updated successfully');
    }

    /**
     * Remove the specified salesorderitem from storage.
     * DELETE /salesorderitems/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var salesorderitem $salesorderitem */
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            return $this->sendError('Salesorderitem not found');
        }

        $salesorderitem->delete();

        return $this->sendResponse($id, 'Salesorderitem deleted successfully');
    }
}
