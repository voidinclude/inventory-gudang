<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class purchase_price
 * @package App\Models
 * @version January 16, 2017, 12:56 pm UTC
 */
class purchase_price extends Model
{
    use SoftDeletes;

    public $table = 'purchase_prices';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'supplierID',
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
        'supplierID' => 'integer',
        'productID' => 'integer',
        'productCode' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'supplierID' => 'numeric',
        'productID' => 'numeric',
        'productCode' => 'required',
        'price' => 'numeric'
    ];

    
}
