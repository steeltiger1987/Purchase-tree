<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class ShoppingCartProduct extends Eloquent
{

    protected $table = 'shopping_cart_product';

    public function ShoppingCart(){
        return $this->belongsTo('ShoppingCart', 'cart_id');
    }

    public function Product(){
        return $this->belongsTo('Product', 'product_id');
    }

    public function seller(){
        return $this->belongsTo('Members','seller_id');
    }
    public function buyer(){
        return $this->belongsTo('Members','buyer_id');
    }


}