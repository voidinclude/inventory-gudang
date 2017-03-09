<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesalesordersAPIRequest;
use App\Http\Requests\API\UpdatesalesordersAPIRequest;
use App\Models\salesorders;
use App\Repositories\salesordersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class salesordersController
 * @package App\Http\Controllers\API
 */

class salesordersAPIController extends AppBaseController
{
    /** @var  salesordersRepository */
    private $salesordersRepository;

    public function __construct(salesordersRepository $salesordersRepo)
    {
        $this->salesordersRepository = $salesordersRepo;
    }

    /**
     * Display a listing of the salesorders.
     * GET|HEAD /salesorders
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salesordersRepository->pushCriteria(new RequestCriteria($request));
        $this->salesordersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salesorders = $this->salesordersRepository->all();

        return $this->sendResponse($salesorders->toArray(), 'Salesorders retrieved successfully');
    }

    /**
     * Store a newly created salesorders in storage.
     * POST /salesorders
     *
     * @param CreatesalesordersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesordersAPIRequest $request)
    {
        $input = $request->all();

        $salesorders = $this->salesordersRepository->create($input);

        return $this->sendResponse($salesorders->toArray(), 'Salesorders saved successfully');
    }

    /**
     * Display the specified salesorders.
     * GET|HEAD /salesorders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var salesorders $salesorders */
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            return $this->sendError('Salesorders not found');
        }

        return $this->sendResponse($salesorders->toArray(), 'Salesorders retrieved successfully');
    }

    /**
     * Update the specified salesorders in storage.
     * PUT/PATCH /salesorders/{id}
     *
     * @param  int $id
     * @param UpdatesalesordersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesordersAPIRequest $request)
    {
        $input = $request->all();

        /** @var salesorders $salesorders */
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            return $this->sendError('Salesorders not found');
        }

        $salesorders = $this->salesordersRepository->update($input, $id);

        return $this->sendResponse($salesorders->toArray(), 'salesorders updated successfully');
    }

    /**
     * Remove the specified salesorders from storage.
     * DELETE /salesorders/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var salesorders $salesorders */
        $salesorders = $this->salesordersRepository->findWithoutFail($id);

        if (empty($salesorders)) {
            return $this->sendError('Salesorders not found');
        }

        $salesorders->delete();

        return $this->sendResponse($id, 'Salesorders deleted successfully');
    }
}
