<?php

namespace App\Repositories;

use App\Models\SalesPrice;
use InfyOm\Generator\Common\BaseRepository;

class SalesPriceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customerID',
        'productID',
        'productCode',
        'price'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SalesPrice::class;
    }
}
