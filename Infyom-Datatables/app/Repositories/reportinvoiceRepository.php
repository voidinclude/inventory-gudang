<?php

namespace App\Repositories;

use App\Models\reportinvoice;
use InfyOm\Generator\Common\BaseRepository;

class reportinvoiceRepository extends BaseRepository
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
        return reportinvoice::class;
    }
}
