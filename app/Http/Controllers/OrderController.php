<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Throwable;

class OrderController extends Controller
{
    public function checkoutPage()
    {
        return view('checkout');
    }

    public function storeOrder(Request $request)
    {
        $request->validate([
            'user_name' => 'required',
            'user_surname' => 'required'
        ]);

        try{
            $cart = auth()->user()->cart;
            $order = Order::add($request->all());

            foreach($cart->items as $item){
                OrderItem::add($item, $order);
            }

            $order->total_sum = $cart->getTotalPrice();
            $order->save();
            $cart->delete();
        } catch (Throwable $e){
            report($e);
            return false;
        };
        
        return redirect()->route('app.order-thankyou', $order);
    }

    public function thankyouPage(Order $order)
    {
        return view('order-thankyou', [
            'order' => $order,
        ]);
    }

    public function orders()
    {
        return view('orders.index', [
            'orders' => Order::all()->sortByDesc('created_at')
        ]);
    }
    
}
