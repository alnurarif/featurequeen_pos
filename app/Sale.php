<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = [
    	'sale_no','product_number','amount','paid_amount','due_amount','description','customer_id','added_by','sale_date'
    ];

    public function customer(){
    	return $this->belongsTo(Customer::class,'customer_id');
    }
    public function user_added(){
    	return $this->belongsTo(User::class,'added_by');
    }
    public function sale_details(){
		return $this->hasMany(SaleDetail::class,'sale_id');
	}
}
