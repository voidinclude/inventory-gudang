<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class factories
 * @package App\Models
 * @version January 17, 2017, 3:32 am UTC
 */
class factories extends Model
{
    use SoftDeletes;

    public $table = 'factories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'factoryCode',
        'factoryName',
        'factoryType',
        'status',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'factoryCode' => 'string',
        'factoryName' => 'string',
        'factoryType' => 'string',
        'status' => 'string',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'factoryCode' => 'required',
        'factoryName' => 'required',
        'factoryType' => 'required',
        'status' => 'required',
        'note' => 'min:3'
    ];

    
}
