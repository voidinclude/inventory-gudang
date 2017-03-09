<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class produk
 * @package App\Models
 * @version January 19, 2017, 10:01 am UTC
 */
class produk extends Model
{
    use SoftDeletes;

    public $table = 'products';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'productCode',
        'productName',
        'unitText',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'productCode' => 'string',
        'productName' => 'string',
        'unit' => 'integer',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'productCode' => 'required',
        'productName' => 'required',
        'unit' => 'numeric'
    ];

    
}
