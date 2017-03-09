<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class salesorderitem
 * @package App\Models
 * @version January 17, 2017, 2:42 am UTC
 */
class salesorderitem extends Model
{
    use SoftDeletes;

    public $table = 'salesorderitems';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'soID',
        'productID',
        'productName',
        'sku',
        'price',
        'qty',
        'note',
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
        'soID' => 'string',
        'productID' => 'integer',
        'productName' => 'string',
        'sku' => 'string',
        'price' => 'integer',
        'qty' => 'integer',
        'note' => 'string',
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
        'soID' => 'required',
        'productID' => 'numeric',
        'productName' => 'required',
        'sku' => 'required',
        'price' => 'numeric',
        'qty' => 'numeric',
        'note' => 'min:5',
        'createdDate' => 'date',
        'createdUserID' => 'numeric',
        'modifiedDate' => 'date',
        'modifiedUserID' => 'numeric'
    ];

    
}
