<?php

namespace App\Repositories;

use App\Models\salesinvoices;
use InfyOm\Generator\Common\BaseRepository;

class salesinvoicesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoiceNo',
        'invoiceDate',
        'soID',
        'status',
        'paymentType',
        'expiredDate',
        'ppn',
        'total',
        'discount',
        'grandtotal',
        'customerID',
        'customerName',
        'customerAddress',
        'staffID'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return salesinvoices::class;
    }
}
