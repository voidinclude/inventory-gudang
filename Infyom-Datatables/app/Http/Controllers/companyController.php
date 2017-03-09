<?php

namespace App\Http\Controllers;

use App\DataTables\companyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecompanyRequest;
use App\Http\Requests\UpdatecompanyRequest;
use App\Repositories\companyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class companyController extends AppBaseController
{
    /** @var  companyRepository */
    private $companyRepository;

    public function __construct(companyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
        $this->middleware('auth');
        //$this->middleware('admin');
    }

    /**
     * Display a listing of the company.
     *
     * @param companyDataTable $companyDataTable
     * @return Response
     */
    public function index(companyDataTable $companyDataTable)
    {
        return $companyDataTable->render('companies.index');
    }

    /**
     * Show the form for creating a new company.
     *
     * @return Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created company in storage.
     *
     * @param CreatecompanyRequest $request
     *
     * @return Response
     */
    public function store(CreatecompanyRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->create($input);

        Flash::success('Company saved successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Display the specified company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified company.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        return view('companies.edit')->with('company', $company);
    }

    /**
     * Update the specified company in storage.
     *
     * @param  int              $id
     * @param UpdatecompanyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecompanyRequest $request)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $company = $this->companyRepository->update($request->all(), $id);

        Flash::success('Company updated successfully.');

        return redirect(route('companies.index'));
    }

    /**
     * Remove the specified company from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $company = $this->companyRepository->findWithoutFail($id);

        if (empty($company)) {
            Flash::error('Company not found');

            return redirect(route('companies.index'));
        }

        $this->companyRepository->delete($id);

        Flash::success('Company deleted successfully.');

        return redirect(route('companies.index'));
    }
}
