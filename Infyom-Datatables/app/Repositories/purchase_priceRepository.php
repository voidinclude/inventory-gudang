<?php

namespace App\Repositories;

use App\Models\purchase_price;
use InfyOm\Generator\Common\BaseRepository;

class purchase_priceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'supplierID',
        'productID',
        'productCode',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return purchase_price::class;
    }
}
