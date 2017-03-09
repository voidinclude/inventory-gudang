<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesalesinvoicesAPIRequest;
use App\Http\Requests\API\UpdatesalesinvoicesAPIRequest;
use App\Models\salesinvoices;
use App\Repositories\salesinvoicesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class salesinvoicesController
 * @package App\Http\Controllers\API
 */

class salesinvoicesAPIController extends AppBaseController
{
    /** @var  salesinvoicesRepository */
    private $salesinvoicesRepository;

    public function __construct(salesinvoicesRepository $salesinvoicesRepo)
    {
        $this->salesinvoicesRepository = $salesinvoicesRepo;
    }

    /**
     * Display a listing of the salesinvoices.
     * GET|HEAD /salesinvoices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesinvoicesRepository->pushCriteria(new RequestCriteria($request));
        $this->salesinvoicesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesinvoices = $this->salesinvoicesRepository->all();

        return $this->sendResponse($salesinvoices->toArray(), 'Salesinvoices retrieved successfully');
    }

    /**
     * Store a newly created salesinvoices in storage.
     * POST /salesinvoices
     *
     * @param CreatesalesinvoicesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesinvoicesAPIRequest $request)
    {
        $input = $request->all();

        $salesinvoices = $this->salesinvoicesRepository->create($input);

        return $this->sendResponse($salesinvoices->toArray(), 'Salesinvoices saved successfully');
    }

    /**
     * Display the specified salesinvoices.
     * GET|HEAD /salesinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var salesinvoices $salesinvoices */
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            return $this->sendError('Salesinvoices not found');
        }

        return $this->sendResponse($salesinvoices->toArray(), 'Salesinvoices retrieved successfully');
    }

    /**
     * Update the specified salesinvoices in storage.
     * PUT/PATCH /salesinvoices/{id}
     *
     * @param  int $id
     * @param UpdatesalesinvoicesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesinvoicesAPIRequest $request)
    {
        $input = $request->all();

        /** @var salesinvoices $salesinvoices */
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            return $this->sendError('Salesinvoices not found');
        }

        $salesinvoices = $this->salesinvoicesRepository->update($input, $id);

        return $this->sendResponse($salesinvoices->toArray(), 'salesinvoices updated successfully');
    }

    /**
     * Remove the specified salesinvoices from storage.
     * DELETE /salesinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var salesinvoices $salesinvoices */
        $salesinvoices = $this->salesinvoicesRepository->findWithoutFail($id);

        if (empty($salesinvoices)) {
            return $this->sendError('Salesinvoices not found');
        }

        $salesinvoices->delete();

        return $this->sendResponse($id, 'Salesinvoices deleted successfully');
    }
}
