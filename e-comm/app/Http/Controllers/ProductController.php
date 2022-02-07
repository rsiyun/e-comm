<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::all();
        return view('product', ['products' => $data]);
    }
    public function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['data' => $data]);
    }
    public function search(Request $request)
    {
        $data = Product::where('name', 'like', '%' . $request->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }
    public function addToCart(Request $request)
    {
        if ($request->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $request->session()->get('user')['id'];
            $cart->product_id = $request->product_id;
            $cart->save();
            return redirect("/");
        } else {
            return redirect("/login");
        }
    }
    public function cartItem()
    {
        if (!session()->has('user')) {
            return 0;
        } else {
            $user_id = session()->get('user')['id'];
            return Cart::where('user_id', $user_id)->count();
        }
    }
    public function cartlist()
    {
        $user_id = session()->get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->select('products.*', 'cart.id as cart_id')
            ->get();
        return view('cartlist', ['products' => $products]);
    }
    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect("/cartlist");
    }
    public function orderNow()
    {
        $user_id = session()->get('user')['id'];
        $products = DB::table('cart')
            ->join('products', 'cart.product_id', '=', 'products.id')
            ->where('cart.user_id', $user_id)
            ->sum('products.price');

        return view('ordernow', ['total' => $products]);
    }
    public function orderPlace(Request $request)
    {
        $user_id = session()->get('user')['id'];
        $allcart = Cart::where('user_id', $user_id)->get();
        foreach ($allcart as $cart) {
            $order = new Order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = "pending";
            $order->payment_method = $request->payment;
            $order->payment_status = "pending";
            $order->address = $request->address;
            $order->save();
            Cart::where('user_id', $user_id)->delete();
        }
        $request->input();
        return redirect('/');
    }
    public function myOrder()
    {
        $user_id = session()->get('user')['id'];
        $products = DB::table('orders')
            ->join('products', 'orders.product_id', '=', 'products.id')
            ->where('orders.user_id', $user_id)
            ->get();
        return view('myorder', ['orders' => $products]);
    }
}
