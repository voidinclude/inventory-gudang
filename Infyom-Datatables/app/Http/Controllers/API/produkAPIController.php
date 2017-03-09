<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateprodukAPIRequest;
use App\Http\Requests\API\UpdateprodukAPIRequest;
use App\Models\produk;
use App\Repositories\produkRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class produkController
 * @package App\Http\Controllers\API
 */

class produkAPIController extends AppBaseController
{
    /** @var  produkRepository */
    private $produkRepository;

    public function __construct(produkRepository $produkRepo)
    {
        $this->produkRepository = $produkRepo;
    }

    /**
     * Display a listing of the produk.
     * GET|HEAD /produks
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->produkRepository->pushCriteria(new RequestCriteria($request));
        $this->produkRepository->pushCriteria(new LimitOffsetCriteria($request));
        $produks = $this->produkRepository->all();

        return $this->sendResponse($produks->toArray(), 'Produks retrieved successfully');
    }

    /**
     * Store a newly created produk in storage.
     * POST /produks
     *
     * @param CreateprodukAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateprodukAPIRequest $request)
    {
        $input = $request->all();

        $produks = $this->produkRepository->create($input);

        return $this->sendResponse($produks->toArray(), 'Produk saved successfully');
    }

    /**
     * Display the specified produk.
     * GET|HEAD /produks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        return $this->sendResponse($produk->toArray(), 'Produk retrieved successfully');
    }

    /**
     * Update the specified produk in storage.
     * PUT/PATCH /produks/{id}
     *
     * @param  int $id
     * @param UpdateprodukAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateprodukAPIRequest $request)
    {
        $input = $request->all();

        /** @var produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        $produk = $this->produkRepository->update($input, $id);

        return $this->sendResponse($produk->toArray(), 'produk updated successfully');
    }

    /**
     * Remove the specified produk from storage.
     * DELETE /produks/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var produk $produk */
        $produk = $this->produkRepository->findWithoutFail($id);

        if (empty($produk)) {
            return $this->sendError('Produk not found');
        }

        $produk->delete();

        return $this->sendResponse($id, 'Produk deleted successfully');
    }
}
