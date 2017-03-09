<?php

namespace App\Repositories;

use App\Models\company;
use InfyOm\Generator\Common\BaseRepository;

class companyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'companyCode',
        'companyName',
        'contactPerson',
        'address',
        'village',
        'district',
        'city',
        'zipcode',
        'province',
        'phone',
        'fax',
        'phonecp',
        'email',
        'print_address',
        'faktur_address'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return company::class;
    }
}
