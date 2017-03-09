<?php

namespace App\Repositories;

use App\Models\stock_products;
use InfyOm\Generator\Common\BaseRepository;

class stock_productsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return stock_products::class;
    }
}
