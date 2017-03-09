<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salesorders
 * @package App\Models
 * @version January 17, 2017, 5:10 am UTC
 */
class salesorders extends Model
{
    use SoftDeletes;

    public $table = 'salesorders';
    

    protected $dates = ['deleted_at'];

    public $fillable = [
        'soNo',
        'customerID',
        'customerName',
        'customerAddress',
        'staffID',
        'staffName',
        'orderDate',
        'needDate',
        'note',
        'status',
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
        'soNo' => 'string',
        'customerID' => 'integer',
        'customerName' => 'string',
        'customerAddress' => 'string',
        'staffID' => 'integer',
        'staffName' => 'string',
        'orderDate' => 'date',
        'needDate' => 'date',
        'note' => 'string',
        'status' => 'integer',
        'createdDate' => 'date',
        'createdUserID' => 'integer',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'soNo' => 'required',
        'customerID' => 'required',
    ];

    
}
