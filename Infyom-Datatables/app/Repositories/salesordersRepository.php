<?php

namespace App\Repositories;

use App\Models\salesorders;
use InfyOm\Generator\Common\BaseRepository;

class salesordersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'soNo',
        'customerID',
        'customerName',
        'customerAddress',
        'staffID',
        'staffName',
        'orderDate',
        'needDate',
        'note',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return salesorders::class;
    }
}
