<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class receives
 * @package App\Models
 * @version January 16, 2017, 10:30 am UTC
 */
class receives extends Model
{
    use SoftDeletes;

    public $table = 'receives';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'invoiceID',
        'customerID',
        'invoiceTotal',
        'receiveTotal',
        'refundTotal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoiceID' => 'integer',
        'customerID' => 'integer',
        'invoiceTotal' => 'integer',
        'receiveTotal' => 'integer',
        'refundTotal' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'invoiceID' => 'numeric',
        'customerID' => 'numeric',
        'invoiceTotal' => 'numeric',
        'receiveTotal' => 'numeric',
        'refundTotal' => 'numeric'
    ];

    
}
