<?php 

namespace App\Services\Cart;

use Gloudemans\Shoppingcart\Cart;
use App\Orders;

class UseCart extends Cart
{
  
    /**
     * Store an the current instance of the cart.
     *
     * @param mixed $information,$identifier
     * @return int
     */

    protected function myStore($information,$id) 
    {
        return $this->getConnection()->table($this->getTableName())->insertGetId([
            'name' => $information['name'],
            'phone' => $information['phone'],
            'address' => $information['address'],
            'instance' => $this->currentInstance(),
            'total_amount' => $this->count(),
            'total_price' => $this->total(),
            'user_id' => $id,
            'created_at'=> new \DateTime()
        ]);

    }

    public function getStore($information,$id)
    {   

        $id = $this->myStore($information,$id);
        
        if( ! $id) 
        {
            throw new Expection('update false');
        }

        return $id;  
    }

    protected function storeProduct(Orders $order,$id) 
    {
        
        foreach($this->getContent() as $item) {
            $data [$item->id] = array(
               
                    'order_id' => $id,
                    'qty' => $item->qty,
                    'rowId' => $item->rowId,
                    'priceTax' => $item->tax, 
                    'price' => $item->total
                
            );
            
        }
        
        return $order->products()->syncWithoutDetaching($data); 
        
    }

    public function getStoreProduct(Orders $order,$id)
    {
        if( ! $this->storeProduct($order,$id))
        {
            throw new Exception('updata false');
        }
    }

    protected function storedCartWithIdentifierExists($id)
    {
        return $this->getConnection()->table($this->getTableName())->where('id', $id)->exists();
    }

    public function restore($id) 
    {
        if( ! $this->storedCartWithIdentifierExists($id)) {
            throw new Expection ( "this not exsict" );
        }

        $store = $this->getConnection()->table($this->getTableName())->find($id);

        $contentStore = $this->getConnection()->table('detail_orders')->join('products','products.id','=','detail_orders.product_id',)->where('order_id',$store->id)->get();
        
        $content = $this->getContent();

        $currentInstance = $this->currentInstance();
        
        $this->instance($store->instance);

        foreach($contentStore as $item) {

            $content->put($item->rowId, $item);
        }
        
        $this->session->put($this->instance, $content);

        $this->instance($currentInstance);
        
    }

    public function getRestore($id)
    {
        return restore($id);
    }

    
}


?>