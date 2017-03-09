<?php

namespace App\Http\Controllers;

use App\DataTables\receivesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatereceivesRequest;
use App\Http\Requests\UpdatereceivesRequest;
use App\Repositories\receivesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class receivesController extends AppBaseController
{
    /** @var  receivesRepository */
    private $receivesRepository;

    public function __construct(receivesRepository $receivesRepo)
    {
        $this->receivesRepository = $receivesRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the receives.
     *
     * @param receivesDataTable $receivesDataTable
     * @return Response
     */
    public function index(receivesDataTable $receivesDataTable)
    {
        return $receivesDataTable->render('receives.index');
    }

    /**
     * Show the form for creating a new receives.
     *
     * @return Response
     */
    public function create()
    {
        return view('receives.create');
    }

    /**
     * Store a newly created receives in storage.
     *
     * @param CreatereceivesRequest $request
     *
     * @return Response
     */
    public function store(CreatereceivesRequest $request)
    {
        $input = $request->all();

        $receives = $this->receivesRepository->create($input);

        Flash::success('Receives saved successfully.');

        return redirect(route('receives.index'));
    }

    /**
     * Display the specified receives.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            Flash::error('Receives not found');

            return redirect(route('receives.index'));
        }

        return view('receives.show')->with('receives', $receives);
    }

    /**
     * Show the form for editing the specified receives.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            Flash::error('Receives not found');

            return redirect(route('receives.index'));
        }

        return view('receives.edit')->with('receives', $receives);
    }

    /**
     * Update the specified receives in storage.
     *
     * @param  int              $id
     * @param UpdatereceivesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereceivesRequest $request)
    {
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            Flash::error('Receives not found');

            return redirect(route('receives.index'));
        }

        $receives = $this->receivesRepository->update($request->all(), $id);

        Flash::success('Receives updated successfully.');

        return redirect(route('receives.index'));
    }

    /**
     * Remove the specified receives from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $receives = $this->receivesRepository->findWithoutFail($id);

        if (empty($receives)) {
            Flash::error('Receives not found');

            return redirect(route('receives.index'));
        }

        $this->receivesRepository->delete($id);

        Flash::success('Receives deleted successfully.');

        return redirect(route('receives.index'));
    }
}
