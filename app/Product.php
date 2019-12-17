<?php

namespace App;
use App\Brand;
use App\Category;
use App\ProductPurchaseDetail;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'name','color','brand_id','category_id','added_by','is_active'
    ];

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id');
    }
    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }
    public function product_purchase_detail(){
    	return $this->hasMany(ProductPurchaseDetail::class);
    }
}
