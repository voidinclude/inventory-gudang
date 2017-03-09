<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class SalesPrice
 * @package App\Models
 * @version January 16, 2017, 12:59 pm UTC
 */
class SalesPrice extends Model
{
    use SoftDeletes;

    public $table = 'sales_prices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'customerID',
        'productID',
        'productCode',
        'price'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'customerID' => 'integer',
        'productID' => 'integer',
        'productCode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'customerID' => 'numeric',
        'productID' => 'numeric',
        'price' => 'numeric'
    ];

    
}
