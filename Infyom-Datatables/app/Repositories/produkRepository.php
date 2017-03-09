<?php

namespace App\Repositories;

use App\Models\produk;
use InfyOm\Generator\Common\BaseRepository;

class produkRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'productCode',
        'productName',
        'unit',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return produk::class;
    }
}
