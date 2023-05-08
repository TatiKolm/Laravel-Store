<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product)
    {
        $currentUser = auth()->user();
        $args=[];

        if($currentUser){
            $args['user_id'] = $currentUser ->id;
        }

        $cart = $currentUser->cart;
        

        if(! $cart){
            $cart = Cart::create($args); 
        }
       

        CartItem::create([
            'cart_id'=> $cart->id,
            'product_id'=> $product -> id,
            'price' => $product -> price,
            'sub_total' => $product -> price
        ]);


        return response()->json([
            'qty'=> $cart->items->count(),
            'success' => 'Товар добавлен в корзину'
        ]);
    }

    public function cartPage()
    {
        return view('cart', [
            'cart' => auth()->user()->cart
        ]);
    }

    public function changeQty(Request $request, CartItem $item)
    {
        $item->update(['quantity' => $request->input('quantity')]);
        return back();
    }

    public function destroy(CartItem $item)
    {
        $item->delete();
        return back();
    }
}
