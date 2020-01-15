<?php

namespace App;


class Cart
{
    public $items;
    public $totalQty=0;
    public $totalAmount=0;
    public function __construct($oldCart )
    {

        if($oldCart){
            $this->totalAmount=$oldCart->totalAmount;
            $this->items=$oldCart->items;
            $this->totalQty=$oldCart->totalQty;

        }else{
            $this->items=null;
        }
    }
    public function  decrease($id){
        $this->items[$id]['qty']--;
        $this->items[$id]['amount'] -=$this->items[$id]['item']['price'];
        $this->totalQty--;
        $this->totalAmount -=$this->items[$id]['item']['price'];
        if ($this->items[$id]['qty']<1){
            unset($this->items[$id]);
        }
    }
    public function  increase($id){
        $this->items[$id]['qty']++;
        $this->items[$id]['amount'] +=$this->items[$id]['item']['price'];
        $this->totalQty++;
        $this->totalAmount +=$this->items[$id]['item']['price'];
    }
    public function add($post){
        $storeItem=['item'=>$post,'amount'=>$post->price,'qty'=>0];
        if ($this->items){
            if (array_key_exists($post->id,$this->items)){
                $storeItem=$this->items[$post->id];
            }
        }
        $storeItem['qty']++;
        $storeItem['amount']=$storeItem['qty'] * $post->price;
        $this->items[$post->id]=$storeItem;
        $this->totalQty++;
        $this->totalAmount += $post->price;

    }
}
