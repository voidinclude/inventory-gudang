<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesalespaymentsAPIRequest;
use App\Http\Requests\API\UpdatesalespaymentsAPIRequest;
use App\Models\salespayments;
use App\Repositories\salespaymentsRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class salespaymentsController
 * @package App\Http\Controllers\API
 */

class salespaymentsAPIController extends AppBaseController
{
    /** @var  salespaymentsRepository */
    private $salespaymentsRepository;

    public function __construct(salespaymentsRepository $salespaymentsRepo)
    {
        $this->salespaymentsRepository = $salespaymentsRepo;
    }

    /**
     * Display a listing of the salespayments.
     * GET|HEAD /salespayments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->salespaymentsRepository->pushCriteria(new RequestCriteria($request));
        $this->salespaymentsRepository->pushCriteria(new LimitOffsetCriteria($request));
        $salespayments = $this->salespaymentsRepository->all();

        return $this->sendResponse($salespayments->toArray(), 'Salespayments retrieved successfully');
    }

    /**
     * Store a newly created salespayments in storage.
     * POST /salespayments
     *
     * @param CreatesalespaymentsAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesalespaymentsAPIRequest $request)
    {
        $input = $request->all();

        $salespayments = $this->salespaymentsRepository->create($input);

        return $this->sendResponse($salespayments->toArray(), 'Salespayments saved successfully');
    }

    /**
     * Display the specified salespayments.
     * GET|HEAD /salespayments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var salespayments $salespayments */
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            return $this->sendError('Salespayments not found');
        }

        return $this->sendResponse($salespayments->toArray(), 'Salespayments retrieved successfully');
    }

    /**
     * Update the specified salespayments in storage.
     * PUT/PATCH /salespayments/{id}
     *
     * @param  int $id
     * @param UpdatesalespaymentsAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalespaymentsAPIRequest $request)
    {
        $input = $request->all();

        /** @var salespayments $salespayments */
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            return $this->sendError('Salespayments not found');
        }

        $salespayments = $this->salespaymentsRepository->update($input, $id);

        return $this->sendResponse($salespayments->toArray(), 'salespayments updated successfully');
    }

    /**
     * Remove the specified salespayments from storage.
     * DELETE /salespayments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var salespayments $salespayments */
        $salespayments = $this->salespaymentsRepository->findWithoutFail($id);

        if (empty($salespayments)) {
            return $this->sendError('Salespayments not found');
        }

        $salespayments->delete();

        return $this->sendResponse($id, 'Salespayments deleted successfully');
    }
}
