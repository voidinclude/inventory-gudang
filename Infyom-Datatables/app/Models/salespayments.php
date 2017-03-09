<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salespayments
 * @package App\Models
 * @version January 17, 2017, 2:56 am UTC
 */
class salespayments extends Model
{
    use SoftDeletes;

    public $table = 'salespayments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'note',
        'staffID',
        'staffName',
        'createdDate',
        'createdUserID',
        'modifiedDate',
        'modifiedUserID'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'paymentNo' => 'string',
        'invoiceID' => 'integer',
        'paymentDate' => 'date',
        'payType' => 'string',
        'bankNo' => 'string',
        'bankName' => 'string',
        'bankAC' => 'string',
        'effectiveDate' => 'date',
        'total' => 'integer',
        'customerID' => 'integer',
        'customerName' => 'string',
        'customerAddress' => 'string',
        'note' => 'string',
        'staffID' => 'integer',
        'staffName' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'paymentNo' => 'required',
        'paymentDate' => 'required',
        'customerID' => 'required',
        'totalPaid' => 'min:1'
    ];

    
}
