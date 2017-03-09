<?php

namespace App\Http\Controllers;

use App\DataTables\salesorderitemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatesalesorderitemRequest;
use App\Http\Requests\UpdatesalesorderitemRequest;
use App\Repositories\salesorderitemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class salesorderitemController extends AppBaseController
{
    /** @var  salesorderitemRepository */
    private $salesorderitemRepository;

    public function __construct(salesorderitemRepository $salesorderitemRepo)
    {
        $this->salesorderitemRepository = $salesorderitemRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the salesorderitem.
     *
     * @param salesorderitemDataTable $salesorderitemDataTable
     * @return Response
     */
    public function index(salesorderitemDataTable $salesorderitemDataTable)
    {
        return $salesorderitemDataTable->render('salesorderitems.index');
    }

    /**
     * Show the form for creating a new salesorderitem.
     *
     * @return Response
     */
    public function create()
    {
        return view('salesorderitems.create');
    }

    /**
     * Store a newly created salesorderitem in storage.
     *
     * @param CreatesalesorderitemRequest $request
     *
     * @return Response
     */
    public function store(CreatesalesorderitemRequest $request)
    {
        $input = $request->all();

        $salesorderitem = $this->salesorderitemRepository->create($input);

        Flash::success('Salesorderitem saved successfully.');

        return redirect(route('salesorderitems.index'));
    }

    /**
     * Display the specified salesorderitem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            Flash::error('Salesorderitem not found');

            return redirect(route('salesorderitems.index'));
        }

        return view('salesorderitems.show')->with('salesorderitem', $salesorderitem);
    }

    /**
     * Show the form for editing the specified salesorderitem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            Flash::error('Salesorderitem not found');

            return redirect(route('salesorderitems.index'));
        }

        return view('salesorderitems.edit')->with('salesorderitem', $salesorderitem);
    }

    /**
     * Update the specified salesorderitem in storage.
     *
     * @param  int              $id
     * @param UpdatesalesorderitemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatesalesorderitemRequest $request)
    {
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            Flash::error('Salesorderitem not found');

            return redirect(route('salesorderitems.index'));
        }

        $salesorderitem = $this->salesorderitemRepository->update($request->all(), $id);

        Flash::success('Salesorderitem updated successfully.');

        return redirect(route('salesorderitems.index'));
    }

    /**
     * Remove the specified salesorderitem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $salesorderitem = $this->salesorderitemRepository->findWithoutFail($id);

        if (empty($salesorderitem)) {
            Flash::error('Salesorderitem not found');

            return redirect(route('salesorderitems.index'));
        }

        $this->salesorderitemRepository->delete($id);

        Flash::success('Salesorderitem deleted successfully.');

        return redirect(route('salesorderitems.index'));
    }
}
