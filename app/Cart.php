<?php

namespace App;

class Cart
{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) 
		{
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function add($item, $id,$size,$material) 
    {
        $storedItem = ['qty' => 0, 'price' => $item->price, 'size' => $size, 'material' => $material, 'item' => $item];
        if ($this->items) 
        {
            if (array_key_exists($id, $this->items)) 
            {
                $storedItem = $this->items[$id];
            }
        }
        $storedItem['qty']++;
        $storedItem['price'] = $item->price * $storedItem['qty'];
        $this->items[$id] = $storedItem;
        $this->totalQty++;
        $this->totalPrice += $item->price;
    }


    // NOT USING THIS 
	public function getCart()
	{
		if(!session::has('cart'))
		{
			// return view('shopping-cart',['products'=>null]);
            // $products = null;
        // return view('shopping-cart', compact('products'));
            return "hello";
		}
		else
		{
			$oldCart=Session::get('cart');
			$cart=new Cart($oldCart);
            $products = $cart->items;
            return "hello";

            return $products;
            // return view('shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
			// return view('shopping-cart',compact('products'));
        return view('shopping-cart', compact('products'));


		}
	}
}
