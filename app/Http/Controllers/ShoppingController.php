<?php

namespace App\Http\Controllers;

use App\Products;
use Cart;
use Illuminate\Http\Request;


class ShoppingController extends Controller
{
    public function add_to_cart()
    {

        $prd = Products::find(request()->id);

        $cart = Cart::add([
            'id' => $prd->id,
            'name' => $prd->name,
            'price' => $prd->price,
            'qty' => request()->qtr,
        ]);

        Cart::associate($cart->rowId,'App\Products');

        return redirect()->route('cart');
    }

    public function cart()
    {
        return view('cart');
    }

    public function cart_delete($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }

    public function incr($id,$qty)
    {
        Cart::update($id,$qty+1);

        return redirect()->back();
    }

    public function decr($id,$qty)
    {
        Cart::update($id,$qty-1);

        return redirect()->back();
    }

    
}