<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatecompanyAPIRequest;
use App\Http\Requests\API\UpdatecompanyAPIRequest;
use App\Models\company;
use App\Repositories\companyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class companyController
 * @package App\Http\Controllers\API
 */

class companyAPIController extends AppBaseController
{
    /** @var  companyRepository */
    private $companyRepository;

    public function __construct(companyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the company.
     * GET|HEAD /companies
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->companyRepository->pushCriteria(new RequestCriteria($request));
        $this->companyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $companies = $this->companyRepository->all();

        return $this->sendResponse($companies->toArray(), 'Companies retrieved successfully');
    }

    /**
     * Store a newly created company in storage.
     * POST /companies
     *
     * @param CreatecompanyAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatecompanyAPIRequest $request)
    {
        $input = $request->all();

        $companies = $this->companyRepository->create($input);

        return $this->sendResponse($companies->toArray(), 'Company saved successfully');
    }

    /**
     * Display the specified company.
     * GET|HEAD /companies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var company $company */
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        return $this->sendResponse($company->toArray(), 'Company retrieved successfully');
    }

    /**
     * Update the specified company in storage.
     * PUT/PATCH /companies/{id}
     *
     * @param  int $id
     * @param UpdatecompanyAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompanyAPIRequest $request)
    {
        $input = $request->all();

        /** @var company $company */
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company = $this->companyRepository->update($input, $id);

        return $this->sendResponse($company->toArray(), 'company updated successfully');
    }

    /**
     * Remove the specified company from storage.
     * DELETE /companies/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var company $company */
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            return $this->sendError('Company not found');
        }

        $company->delete();

        return $this->sendResponse($id, 'Company deleted successfully');
    }
}
