<?php

namespace App\Repositories;

use App\Models\reportpayment;
use InfyOm\Generator\Common\BaseRepository;

class reportpaymentRepository extends BaseRepository
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
        return reportpayment::class;
    }
}
