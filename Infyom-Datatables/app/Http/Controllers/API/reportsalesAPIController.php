<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereportsalesAPIRequest;
use App\Http\Requests\API\UpdatereportsalesAPIRequest;
use App\Models\reportsales;
use App\Repositories\reportsalesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class reportsalesController
 * @package App\Http\Controllers\API
 */

class reportsalesAPIController extends AppBaseController
{
    /** @var  reportsalesRepository */
    private $reportsalesRepository;

    public function __construct(reportsalesRepository $reportsalesRepo)
    {
        $this->reportsalesRepository = $reportsalesRepo;
    }

    /**
     * Display a listing of the reportsales.
     * GET|HEAD /reportsales
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportsalesRepository->pushCriteria(new RequestCriteria($request));
        $this->reportsalesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $reportsales = $this->reportsalesRepository->all();

        return $this->sendResponse($reportsales->toArray(), 'Reportsales retrieved successfully');
    }

    /**
     * Store a newly created reportsales in storage.
     * POST /reportsales
     *
     * @param CreatereportsalesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereportsalesAPIRequest $request)
    {
        $input = $request->all();

        $reportsales = $this->reportsalesRepository->create($input);

        return $this->sendResponse($reportsales->toArray(), 'Reportsales saved successfully');
    }

    /**
     * Display the specified reportsales.
     * GET|HEAD /reportsales/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var reportsales $reportsales */
        $reportsales = $this->reportsalesRepository->findWithoutFail($id);

        if (empty($reportsales)) {
            return $this->sendError('Reportsales not found');
        }

        return $this->sendResponse($reportsales->toArray(), 'Reportsales retrieved successfully');
    }

    /**
     * Update the specified reportsales in storage.
     * PUT/PATCH /reportsales/{id}
     *
     * @param  int $id
     * @param UpdatereportsalesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereportsalesAPIRequest $request)
    {
        $input = $request->all();

        /** @var reportsales $reportsales */
        $reportsales = $this->reportsalesRepository->findWithoutFail($id);

        if (empty($reportsales)) {
            return $this->sendError('Reportsales not found');
        }

        $reportsales = $this->reportsalesRepository->update($input, $id);

        return $this->sendResponse($reportsales->toArray(), 'reportsales updated successfully');
    }

    /**
     * Remove the specified reportsales from storage.
     * DELETE /reportsales/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reportsales $reportsales */
        $reportsales = $this->reportsalesRepository->findWithoutFail($id);

        if (empty($reportsales)) {
            return $this->sendError('Reportsales not found');
        }

        $reportsales->delete();

        return $this->sendResponse($id, 'Reportsales deleted successfully');
    }
}
