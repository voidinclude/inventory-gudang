<?php

namespace App\Http\Controllers;

use App\DataTables\suppliersDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesuppliersRequest;
use App\Http\Requests\UpdatesuppliersRequest;
use App\Repositories\suppliersRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class suppliersController extends AppBaseController
{
    /** @var  suppliersRepository */
    private $suppliersRepository;

    public function __construct(suppliersRepository $suppliersRepo)
    {
        $this->suppliersRepository = $suppliersRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the suppliers.
     *
     * @param suppliersDataTable $suppliersDataTable
     * @return Response
     */
    public function index(suppliersDataTable $suppliersDataTable)
    {
        return $suppliersDataTable->render('suppliers.index');
    }

    /**
     * Show the form for creating a new suppliers.
     *
     * @return Response
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store a newly created suppliers in storage.
     *
     * @param CreatesuppliersRequest $request
     *
     * @return Response
     */
    public function store(CreatesuppliersRequest $request)
    {
        $input = $request->all();

        $suppliers = $this->suppliersRepository->create($input);

        Flash::success('Suppliers saved successfully.');

        return redirect(route('suppliers.index'));
    }

    /**
     * Display the specified suppliers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            Flash::error('Suppliers not found');

            return redirect(route('suppliers.index'));
        }

        return view('suppliers.show')->with('suppliers', $suppliers);
    }

    /**
     * Show the form for editing the specified suppliers.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            Flash::error('Suppliers not found');

            return redirect(route('suppliers.index'));
        }

        return view('suppliers.edit')->with('suppliers', $suppliers);
    }

    /**
     * Update the specified suppliers in storage.
     *
     * @param  int              $id
     * @param UpdatesuppliersRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesuppliersRequest $request)
    {
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            Flash::error('Suppliers not found');

            return redirect(route('suppliers.index'));
        }

        $suppliers = $this->suppliersRepository->update($request->all(), $id);

        Flash::success('Suppliers updated successfully.');

        return redirect(route('suppliers.index'));
    }

    /**
     * Remove the specified suppliers from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $suppliers = $this->suppliersRepository->findWithoutFail($id);

        if (empty($suppliers)) {
            Flash::error('Suppliers not found');

            return redirect(route('suppliers.index'));
        }

        $this->suppliersRepository->delete($id);

        Flash::success('Suppliers deleted successfully.');

        return redirect(route('suppliers.index'));
    }
}
