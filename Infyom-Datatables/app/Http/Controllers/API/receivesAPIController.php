<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereceivesAPIRequest;
use App\Http\Requests\API\UpdatereceivesAPIRequest;
use App\Models\receives;
use App\Repositories\receivesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class receivesController
 * @package App\Http\Controllers\API
 */

class receivesAPIController extends AppBaseController
{
    /** @var  receivesRepository */
    private $receivesRepository;

    public function __construct(receivesRepository $receivesRepo)
    {
        $this->receivesRepository = $receivesRepo;
    }

    /**
     * Display a listing of the receives.
     * GET|HEAD /receives
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->receivesRepository->pushCriteria(new RequestCriteria($request));
        $this->receivesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $receives = $this->receivesRepository->all();

        return $this->sendResponse($receives->toArray(), 'Receives retrieved successfully');
    }

    /**
     * Store a newly created receives in storage.
     * POST /receives
     *
     * @param CreatereceivesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereceivesAPIRequest $request)
    {
        $input = $request->all();

        $receives = $this->receivesRepository->create($input);

        return $this->sendResponse($receives->toArray(), 'Receives saved successfully');
    }

    /**
     * Display the specified receives.
     * GET|HEAD /receives/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var receives $receives */
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            return $this->sendError('Receives not found');
        }

        return $this->sendResponse($receives->toArray(), 'Receives retrieved successfully');
    }

    /**
     * Update the specified receives in storage.
     * PUT/PATCH /receives/{id}
     *
     * @param  int $id
     * @param UpdatereceivesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereceivesAPIRequest $request)
    {
        $input = $request->all();

        /** @var receives $receives */
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            return $this->sendError('Receives not found');
        }

        $receives = $this->receivesRepository->update($input, $id);

        return $this->sendResponse($receives->toArray(), 'receives updated successfully');
    }

    /**
     * Remove the specified receives from storage.
     * DELETE /receives/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var receives $receives */
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            return $this->sendError('Receives not found');
        }

        $receives->delete();

        return $this->sendResponse($id, 'Receives deleted successfully');
    }
}
