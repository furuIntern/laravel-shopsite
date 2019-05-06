<?php 

namespace App\Services\Cart;

class AddCart
{
    //
    private $items = null ;
    private $totalAmount = 0 ;
    private $totalPrice = 0 ;

    function __construct($oldItem)
    {   
        if($oldItem) {
            
            $this->items = $oldItem->items;
            $this->totalAmount = $oldItem->totalAmount;    
            $this->totalPrice = $oldItem->totalPrice;    
        }
    }
    public function addProduct($product , $id)
    {
        $storeItem = [ 'item' => $product , 'amount' => 0 , 'price' => $product->price ];
        if($this->items) {
            if(array_key_exists($id,$this->items)) {
                $storeItem=$this->items[$id];
            }
        }
        $storeItem['amount']++;
        $storeItem['price']= $storeItem['amount'] * $product->price;
        $this->items[$id]= $storeItem;
        
        $this->totalAmount ++;
        $this->totalPrice += $product->price;
         
        
    }
    
    
    
}


?>