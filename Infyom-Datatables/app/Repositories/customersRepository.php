<?php

namespace App\Repositories;

use App\Models\customers;
use InfyOm\Generator\Common\BaseRepository;

class customersRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'customerCode',
        'customerName',
        'contactPerson',
        'address',
        'address2',
        'village',
        'district',
        'city',
        'zipCode',
        'province',
        'phone',
        'fax',
        'phonecp1',
        'phonecp2',
        'email',
        'note',
        'npwp',
        'pkpName',
        'category',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return customers::class;
    }
}
