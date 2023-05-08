<?php

namespace App\Models;


class cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }
    public function addToCart($product  , $count){

        $storeItem = [
            'qty' => 0,
            'price' => 0,
            'item' => $product,
        ];
        if($this->items && array_key_exists($product->id , $this->items)){
            $storeItem = $this->items[$product->id];
        }

        $storeItem['qty'] += $count;
        $storeItem['price'] = $product->NewPrice ;
        $this->items[$product->id] = $storeItem;
        $this->totalPrice += $product->NewPrice * $count;
        $this->totalQty +=$count;

    }
    public function remove($id){
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['qty'] * $this->items[$id]['price'];
        unset($this->items[$id]);
    }

    public function Update($id , $count){

        $product = product::find($id);

        $this->remove($id);
        $this->addToCart($product , $count);

    }

}
