<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class stock_products
 * @package App\Models
 * @version January 16, 2017, 10:02 am UTC
 */
class stock_products extends Model
{
    use SoftDeletes;

    public $table = 'stock_products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'productID',
        'factoryID',
        'stockIN',
        'stockOut',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'productID' => 'integer',
        'factoryID' => 'integer',
        'stockIN' => 'integer',
        'stockOut' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productID' => 'numeric',
        'factoryID' => 'numeric',
        'stockIN' => 'numeric',
        'stockOut' => 'numeric',
        'note' => 'min:10'
    ];

    
}
