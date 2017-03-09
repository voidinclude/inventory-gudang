<?php

namespace App\Repositories;

use App\Models\salespayments;
use InfyOm\Generator\Common\BaseRepository;

class salespaymentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'paymentNo',
        'invoiceID',
        'paymentDate',
        'payType',
        'bankNo',
        'bankName',
        'bankAC',
        'effectiveDate',
        'total',
        'customerID',
        'customerName',
        'customerAddress',
        'ref',
        'note',
        'staffID',
        'staffName'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return salespayments::class;
    }
}
