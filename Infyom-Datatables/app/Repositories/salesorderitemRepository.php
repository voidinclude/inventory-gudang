<?php

namespace App\Repositories;

use App\Models\salesorderitem;
use InfyOm\Generator\Common\BaseRepository;

class salesorderitemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'soID',
        'productID',
        'productName',
        'sku',
        'price',
        'qty',
        'note'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return salesorderitem::class;
    }
}
