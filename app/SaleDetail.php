<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleDetail extends Model
{
    protected $fillable = [
    	'quantity','unit_price','total_price','description','product_id','customer_id','sale_id','added_by','created_at','updated_at'
    ];
    public function sale(){
    	return $this->belongsTo(Sale::class,'sale_id');
    }
    public function product(){
		return $this->belongsTo(Product::class,'product_id');
	}
}
