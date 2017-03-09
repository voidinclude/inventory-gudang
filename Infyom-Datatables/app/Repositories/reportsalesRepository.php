<?php

namespace App\Repositories;

use App\Models\reportsales;
use InfyOm\Generator\Common\BaseRepository;

class reportsalesRepository extends BaseRepository
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
        return reportsales::class;
    }
}
