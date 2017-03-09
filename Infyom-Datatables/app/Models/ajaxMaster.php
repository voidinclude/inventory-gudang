<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
/**
 * Class ajaxMaster
 * @package App\Models
 * @version January 17, 2017, 7:58 am UTC
 */
class ajaxMaster extends Model
{
    use SoftDeletes;

    public $table = 'products';

     public $fillable = [
        'productCode',
        'productName',
        'unit'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'productCode',
        'productName',
        'unit'
    ];

    /**
     * Validation rules
     *
     * @var array
     */

    public static $rules = [
        'productCode' => 'required',
        'productName' => '',
        'unit' => ''
    ];

    
}
