<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Validation\Validator;

/**
 * Class customers
 * @package App\Models
 * @version January 17, 2017, 3:14 am UTC
 */
class customers extends Model
{
    use SoftDeletes;

    public $table = 'customers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customerCode',
        'customerName',
        'contactPerson',
        'address',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customerCode' => 'string',
        'customerName' => 'string',
        'contactPerson' => 'string',
        'address' => 'string',
        'address2' => 'string',
        'village' => 'string',
        'district' => 'string',
        'city' => 'string',
        'zipCode' => 'integer',
        'province' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'phonecp1' => 'string',
        'phonecp2' => 'string',
        'email' => 'string',
        'note' => 'string',
        'npwp' => 'string',
        'pkpName' => 'string',
        'category' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customerCode' => 'required',
        'customerName' => 'required',
        'contactPerson' => 'required',
        'address' => 'required',
        'city' => 'required',
        'phonecp1' => 'required',
        'email' => 'email'
    ];

}
