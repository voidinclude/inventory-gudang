<?php

namespace App\Repositories;

use App\Models\receives;
use InfyOm\Generator\Common\BaseRepository;

class receivesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoiceID',
        'customerID',
        'invoiceTotal',
        'receiveTotal',
        'refundTotal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return receives::class;
    }
}
