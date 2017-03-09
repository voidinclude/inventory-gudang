<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class suppliers
 * @package App\Models
 * @version January 17, 2017, 6:45 am UTC
 */
class suppliers extends Model
{
    use SoftDeletes;

    public $table = 'suppliers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'supplierCode',
        'supplierName',
        'address',
        'city',
        'phone',
        'fax',
        'contactPerson',
        'email',
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
        'supplierCode' => 'string',
        'supplierName' => 'string',
        'address' => 'string',
        'city' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'contactPerson' => 'string',
        'email' => 'string',
        'createdDate' => 'date',
        'createdUserID' => 'integer',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'supplierCode' => 'required',
        'supplierName' => 'required',
        'address' => 'min:3',
        'city' => 'required',
        'phone' => 'required',
        'fax' => 'required',
        'contactPerson' => 'required',
        'email' => 'email',
        'createdDate' => 'date',
        'createdUserID' => 'numeric',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'numeric'
    ];

    
}
