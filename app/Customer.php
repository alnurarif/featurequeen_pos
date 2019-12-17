<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    	'name','email','phone','address','added_by','is_active'
    ];
}
