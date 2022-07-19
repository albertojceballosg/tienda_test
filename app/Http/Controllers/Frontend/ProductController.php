<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('frontend.products.index', compact('products'));
    }

    public function buy($id)
    {
        $product = Product::findOrFail($id);
        $query = Order::count();

        if($query == 0){
            $code = 1;
        }else{
            $code = $query + 1;
        }

        $order = new Order();
        $order->code = $code;
        $order->product_id = $product->id;
        $order->user_id = Auth::user()->id;
        $order->status = 'Pendiente';
        $order->save();

        return redirect()->route('order.success');
    }

    public function orderSuccess()
    {
        return view('frontend.orders.success');
    }
}
