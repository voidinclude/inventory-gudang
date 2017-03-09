<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class company
 * @package App\Models
 * @version January 16, 2017, 11:15 am UTC
 */
class company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'companyCode' => 'string',
        'companyName' => 'string',
        'contactPerson' => 'string',
        'address' => 'string',
        'village' => 'string',
        'district' => 'string',
        'city' => 'string',
        'zipcode' => 'string',
        'province' => 'string',
        'phone' => 'string',
        'fax' => 'string',
        'phonecp' => 'string',
        'email' => 'string',
        'print_address' => 'string',
        'faktur_address' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'companyCode' => 'required',
        'companyName' => 'required',
        'contactPerson' => 'required',
        'address' => 'min:5',
        'village' => 'required',
        'district' => 'required',
        'city' => 'required',
        'zipcode' => 'required',
        'province' => 'required',
        'phone' => 'required',
        'fax' => 'required',
        'phonecp' => 'required',
        'email' => 'email',
        'print_address' => 'min:6',
        'faktur_address' => 'min:7'
    ];

    
}
