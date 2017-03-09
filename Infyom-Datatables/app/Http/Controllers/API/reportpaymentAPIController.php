<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatereportpaymentAPIRequest;
use App\Http\Requests\API\UpdatereportpaymentAPIRequest;
use App\Models\reportpayment;
use App\Repositories\reportpaymentRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class reportpaymentController
 * @package App\Http\Controllers\API
 */

class reportpaymentAPIController extends AppBaseController
{
    /** @var  reportpaymentRepository */
    private $reportpaymentRepository;

    public function __construct(reportpaymentRepository $reportpaymentRepo)
    {
        $this->reportpaymentRepository = $reportpaymentRepo;
    }

    /**
     * Display a listing of the reportpayment.
     * GET|HEAD /reportpayments
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->reportpaymentRepository->pushCriteria(new RequestCriteria($request));
        $this->reportpaymentRepository->pushCriteria(new LimitOffsetCriteria($request));
        $reportpayments = $this->reportpaymentRepository->all();

        return $this->sendResponse($reportpayments->toArray(), 'Reportpayments retrieved successfully');
    }

    /**
     * Store a newly created reportpayment in storage.
     * POST /reportpayments
     *
     * @param CreatereportpaymentAPIRequest $request
     *
     * @return Response
     */
    public function store(CreatereportpaymentAPIRequest $request)
    {
        $input = $request->all();

        $reportpayments = $this->reportpaymentRepository->create($input);

        return $this->sendResponse($reportpayments->toArray(), 'Reportpayment saved successfully');
    }

    /**
     * Display the specified reportpayment.
     * GET|HEAD /reportpayments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var reportpayment $reportpayment */
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            return $this->sendError('Reportpayment not found');
        }

        return $this->sendResponse($reportpayment->toArray(), 'Reportpayment retrieved successfully');
    }

    /**
     * Update the specified reportpayment in storage.
     * PUT/PATCH /reportpayments/{id}
     *
     * @param  int $id
     * @param UpdatereportpaymentAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatereportpaymentAPIRequest $request)
    {
        $input = $request->all();

        /** @var reportpayment $reportpayment */
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            return $this->sendError('Reportpayment not found');
        }

        $reportpayment = $this->reportpaymentRepository->update($input, $id);

        return $this->sendResponse($reportpayment->toArray(), 'reportpayment updated successfully');
    }

    /**
     * Remove the specified reportpayment from storage.
     * DELETE /reportpayments/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var reportpayment $reportpayment */
        $reportpayment = $this->reportpaymentRepository->findWithoutFail($id);

        if (empty($reportpayment)) {
            return $this->sendError('Reportpayment not found');
        }

        $reportpayment->delete();

        return $this->sendResponse($id, 'Reportpayment deleted successfully');
    }
}
