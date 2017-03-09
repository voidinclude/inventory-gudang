<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UpdateHarga extends Model
{
	protected $table = 'updateharga';
    public $fillable = ['title','description'];
}
