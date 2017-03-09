<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatesuppliersAPIRequest;
use App\Http\Requests\API\UpdatesuppliersAPIRequest;
use App\Models\suppliers;
use App\Repositories\suppliersRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class suppliersController
 * @package App\Http\Controllers\API
 */

class suppliersAPIController extends AppBaseController
{
    /** @var  suppliersRepository */
    private $suppliersRepository;

    public function __construct(suppliersRepository $suppliersRepo)
    {
        $this->suppliersRepository = $suppliersRepo;
    }

    /**
     * Display a listing of the suppliers.
     * GET|HEAD /suppliers
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->suppliersRepository->pushCriteria(new RequestCriteria($request));
        $this->suppliersRepository->pushCriteria(new LimitOffsetCriteria($request));
        $suppliers = $this->suppliersRepository->all();

        return $this->sendResponse($suppliers->toArray(), 'Suppliers retrieved successfully');
    }

    /**
     * Store a newly created suppliers in storage.
     * POST /suppliers
     *
     * @param CreatesuppliersAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatesuppliersAPIRequest $request)
    {
        $input = $request->all();

        $suppliers = $this->suppliersRepository->create($input);

        return $this->sendResponse($suppliers->toArray(), 'Suppliers saved successfully');
    }

    /**
     * Display the specified suppliers.
     * GET|HEAD /suppliers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var suppliers $suppliers */
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            return $this->sendError('Suppliers not found');
        }

        return $this->sendResponse($suppliers->toArray(), 'Suppliers retrieved successfully');
    }

    /**
     * Update the specified suppliers in storage.
     * PUT/PATCH /suppliers/{id}
     *
     * @param  int $id
     * @param UpdatesuppliersAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuppliersAPIRequest $request)
    {
        $input = $request->all();

        /** @var suppliers $suppliers */
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            return $this->sendError('Suppliers not found');
        }

        $suppliers = $this->suppliersRepository->update($input, $id);

        return $this->sendResponse($suppliers->toArray(), 'suppliers updated successfully');
    }

    /**
     * Remove the specified suppliers from storage.
     * DELETE /suppliers/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var suppliers $suppliers */
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            return $this->sendError('Suppliers not found');
        }

        $suppliers->delete();

        return $this->sendResponse($id, 'Suppliers deleted successfully');
    }
}
