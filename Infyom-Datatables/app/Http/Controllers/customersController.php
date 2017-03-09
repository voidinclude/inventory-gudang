<?php

namespace App\Http\Controllers;

use App\DataTables\customersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatecustomersRequest;
use App\Http\Requests\UpdatecustomersRequest;
use App\Repositories\customersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class customersController extends AppBaseController
{
    /** @var  customersRepository */
    private $customersRepository;

    public function __construct(customersRepository $customersRepo)
    {
        $this->customersRepository = $customersRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the customers.
     *
     * @param customersDataTable $customersDataTable
     * @return Response
     */
    public function index(customersDataTable $customersDataTable)
    {
        return $customersDataTable->render('customers.index');
    }

    /**
     * Show the form for creating a new customers.
     *
     * @return Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created customers in storage.
     *
     * @param CreatecustomersRequest $request
     *
     * @return Response
     */
    public function store(CreatecustomersRequest $request)
    {
        $input = $request->all();

        $customers = $this->customersRepository->create($input);

        Flash::success('Customers saved successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Display the specified customers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.show')->with('customers', $customers);
    }

    /**
     * Show the form for editing the specified customers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        return view('customers.edit')->with('customers', $customers);
    }

    /**
     * Update the specified customers in storage.
     *
     * @param  int              $id
     * @param UpdatecustomersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatecustomersRequest $request)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $customers = $this->customersRepository->update($request->all(), $id);

        Flash::success('Customers updated successfully.');

        return redirect(route('customers.index'));
    }

    /**
     * Remove the specified customers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customers = $this->customersRepository->findWithoutFail($id);

        if (empty($customers)) {
            Flash::error('Customers not found');

            return redirect(route('customers.index'));
        }

        $this->customersRepository->delete($id);

        Flash::success('Customers deleted successfully.');

        return redirect(route('customers.index'));
    }
}
