<?php

namespace App\Http\Controllers;

use App\DataTables\factoriesDataTable;
use App\Http\Requests;
use App\Http\Requests\CreatefactoriesRequest;
use App\Http\Requests\UpdatefactoriesRequest;
use App\Repositories\factoriesRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class factoriesController extends AppBaseController
{
    /** @var  factoriesRepository */
    private $factoriesRepository;

    public function __construct(factoriesRepository $factoriesRepo)
    {
        $this->factoriesRepository = $factoriesRepo;
        $this->middleware('auth');
    }

    /**
     * Display a listing of the factories.
     *
     * @param factoriesDataTable $factoriesDataTable
     * @return Response
     */
    public function index(factoriesDataTable $factoriesDataTable)
    {
        return $factoriesDataTable->render('factories.index');
    }

    /**
     * Show the form for creating a new factories.
     *
     * @return Response
     */
    public function create()
    {
        return view('factories.create');
    }

    /**
     * Store a newly created factories in storage.
     *
     * @param CreatefactoriesRequest $request
     *
     * @return Response
     */
    public function store(CreatefactoriesRequest $request)
    {
        $input = $request->all();

        $factories = $this->factoriesRepository->create($input);

        Flash::success('Factories saved successfully.');

        return redirect(route('factories.index'));
    }

    /**
     * Display the specified factories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            Flash::error('Factories not found');

            return redirect(route('factories.index'));
        }

        return view('factories.show')->with('factories', $factories);
    }

    /**
     * Show the form for editing the specified factories.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            Flash::error('Factories not found');

            return redirect(route('factories.index'));
        }

        return view('factories.edit')->with('factories', $factories);
    }

    /**
     * Update the specified factories in storage.
     *
     * @param  int              $id
     * @param UpdatefactoriesRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatefactoriesRequest $request)
    {
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            Flash::error('Factories not found');

            return redirect(route('factories.index'));
        }

        $factories = $this->factoriesRepository->update($request->all(), $id);

        Flash::success('Factories updated successfully.');

        return redirect(route('factories.index'));
    }

    /**
     * Remove the specified factories from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $factories = $this->factoriesRepository->findWithoutFail($id);

        if (empty($factories)) {
            Flash::error('Factories not found');

            return redirect(route('factories.index'));
        }

        $this->factoriesRepository->delete($id);

        Flash::success('Factories deleted successfully.');

        return redirect(route('factories.index'));
    }
}
