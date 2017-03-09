<?php

namespace App\Repositories;

use App\Models\suppliers;
use InfyOm\Generator\Common\BaseRepository;

class suppliersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'supplierCode',
        'supplierName',
        'address',
        'city',
        'phone',
        'fax',
        'contactPerson',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return suppliers::class;
    }
}
