<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatefactoriesAPIRequest;
use App\Http\Requests\API\UpdatefactoriesAPIRequest;
use App\Models\factories;
use App\Repositories\factoriesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class factoriesController
 * @package App\Http\Controllers\API
 */

class factoriesAPIController extends AppBaseController
{
    /** @var  factoriesRepository */
    private $factoriesRepository;

    public function __construct(factoriesRepository $factoriesRepo)
    {
        $this->factoriesRepository = $factoriesRepo;
    }

    /**
     * Display a listing of the factories.
     * GET|HEAD /factories
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->factoriesRepository->pushCriteria(new RequestCriteria($request));
        $this->factoriesRepository->pushCriteria(new LimitOffsetCriteria($request));
        $factories = $this->factoriesRepository->all();

        return $this->sendResponse($factories->toArray(), 'Factories retrieved successfully');
    }

    /**
     * Store a newly created factories in storage.
     * POST /factories
     *
     * @param CreatefactoriesAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatefactoriesAPIRequest $request)
    {
        $input = $request->all();

        $factories = $this->factoriesRepository->create($input);

        return $this->sendResponse($factories->toArray(), 'Factories saved successfully');
    }

    /**
     * Display the specified factories.
     * GET|HEAD /factories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var factories $factories */
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            return $this->sendError('Factories not found');
        }

        return $this->sendResponse($factories->toArray(), 'Factories retrieved successfully');
    }

    /**
     * Update the specified factories in storage.
     * PUT/PATCH /factories/{id}
     *
     * @param  int $id
     * @param UpdatefactoriesAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefactoriesAPIRequest $request)
    {
        $input = $request->all();

        /** @var factories $factories */
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            return $this->sendError('Factories not found');
        }

        $factories = $this->factoriesRepository->update($input, $id);

        return $this->sendResponse($factories->toArray(), 'factories updated successfully');
    }

    /**
     * Remove the specified factories from storage.
     * DELETE /factories/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var factories $factories */
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            return $this->sendError('Factories not found');
        }

        $factories->delete();

        return $this->sendResponse($id, 'Factories deleted successfully');
    }
}
