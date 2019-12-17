<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    protected $fillable = [
    	'bill_no','product_number','amount','paid_amount','due_amount','description','supplier_id','added_by','purchase_date'
    ];

    public function supplier(){
    	return $this->belongsTo(Supplier::class,'supplier_id');
    }
    public function user_added(){
    	return $this->belongsTo(User::class,'added_by');
    }
    public function product_purchase_details(){
		return $this->hasMany(ProductPurchaseDetail::class,'purchase_id');
	}
}
