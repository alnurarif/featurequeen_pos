<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchaseDetail extends Model
{
    protected $fillable = [
    	'quantity','unit_price','total_price','description','product_id','supplier_id','purchase_id','added_by','created_at','updated_at'
    ];
    public function product_purchase(){
    	return $this->belongsTo(ProductPurchase::class,'purchase_id');
    }
    public function product(){
		return $this->belongsTo(Product::class,'product_id');
	}
}
