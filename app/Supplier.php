<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
    	'name','email','phone','address','contact_person','added_by','is_active'
    ];
}
