<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereportinvoiceAPIRequest;
use App\Http\Requests\API\UpdatereportinvoiceAPIRequest;
use App\Models\reportinvoice;
use App\Repositories\reportinvoiceRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class reportinvoiceController
 * @package App\Http\Controllers\API
 */

class reportinvoiceAPIController extends AppBaseController
{
    /** @var  reportinvoiceRepository */
    private $reportinvoiceRepository;

    public function __construct(reportinvoiceRepository $reportinvoiceRepo)
    {
        $this->reportinvoiceRepository = $reportinvoiceRepo;
    }

    /**
     * Display a listing of the reportinvoice.
     * GET|HEAD /reportinvoices
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportinvoiceRepository->pushCriteria(new RequestCriteria($request));
        $this->reportinvoiceRepository->pushCriteria(new LimitOffsetCriteria($request));
        $reportinvoices = $this->reportinvoiceRepository->all();

        return $this->sendResponse($reportinvoices->toArray(), 'Reportinvoices retrieved successfully');
    }

    /**
     * Store a newly created reportinvoice in storage.
     * POST /reportinvoices
     *
     * @param CreatereportinvoiceAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereportinvoiceAPIRequest $request)
    {
        $input = $request->all();

        $reportinvoices = $this->reportinvoiceRepository->create($input);

        return $this->sendResponse($reportinvoices->toArray(), 'Reportinvoice saved successfully');
    }

    /**
     * Display the specified reportinvoice.
     * GET|HEAD /reportinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var reportinvoice $reportinvoice */
        $reportinvoice = $this->reportinvoiceRepository->findWithoutFail($id);

        if (empty($reportinvoice)) {
            return $this->sendError('Reportinvoice not found');
        }

        return $this->sendResponse($reportinvoice->toArray(), 'Reportinvoice retrieved successfully');
    }

    /**
     * Update the specified reportinvoice in storage.
     * PUT/PATCH /reportinvoices/{id}
     *
     * @param  int $id
     * @param UpdatereportinvoiceAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereportinvoiceAPIRequest $request)
    {
        $input = $request->all();

        /** @var reportinvoice $reportinvoice */
        $reportinvoice = $this->reportinvoiceRepository->findWithoutFail($id);

        if (empty($reportinvoice)) {
            return $this->sendError('Reportinvoice not found');
        }

        $reportinvoice = $this->reportinvoiceRepository->update($input, $id);

        return $this->sendResponse($reportinvoice->toArray(), 'reportinvoice updated successfully');
    }

    /**
     * Remove the specified reportinvoice from storage.
     * DELETE /reportinvoices/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reportinvoice $reportinvoice */
        $reportinvoice = $this->reportinvoiceRepository->findWithoutFail($id);

        if (empty($reportinvoice)) {
            return $this->sendError('Reportinvoice not found');
        }

        $reportinvoice->delete();

        return $this->sendResponse($id, 'Reportinvoice deleted successfully');
    }
}
