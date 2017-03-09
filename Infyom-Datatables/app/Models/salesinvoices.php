<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salesinvoices
 * @package App\Models
 * @version January 19, 2017, 8:04 am UTC
 */
class salesinvoices extends Model
{
    use SoftDeletes;

    public $table = 'salesinvoices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoiceNo' => 'string',
        'invoiceDate' => 'string',
        'soID' => 'string',
        'status' => 'string',
        'paymentType' => 'string',
        'expiredDate' => 'string',
        'ppn' => 'string',
        'total' => 'string',
        'discount' => 'string',
        'grandtotal' => 'string',
        'customerID' => 'string',
        'customerName' => 'string',
        'customerAddress' => 'string',
        'staffID' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'invoiceNo' => 'required',
        'invoiceDate' => 'required',
        'soID' => 'required'
    ];

    
}
