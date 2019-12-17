<?php
if (!function_exists('getProductFromProductObjects')) {
    function getProductFromProductObjects($productObjects, $productId){
        $foundProduct = null;
        foreach($productObjects as $product){
            if($product->id == $productId){
                $foundProduct = $product;
            }
        }
        return $foundProduct; 
    } 
}