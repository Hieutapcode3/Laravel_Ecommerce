<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Users;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $product = Products::where('category', 'Meat')->get();
        $count = Auth::check() ? Cart::where('user_id', Auth::id())->count() : 0;
        return view('home.index', compact('product', 'count'));
    }

    public function filterProducts($category)
    {
        $products = Products::where('category', $category)->get();
        return response()->json($products);
    }


    public function login_home(){
        $product = Products::all();
        $user = Auth::user();
        $userid = $user->id;
        $count = Cart::where('user_id',$userid)->count();
        return view('home.index',compact('product','count'));
    }
    public function add_cart($id){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = Auth::user();
        $product_id = $id;
    
        $data = new Cart;
        $data->user_id = $user->id;  
        $data->product_id = $product_id;
        $data->save();
        toastr()->closeOnHover(true)->closeDuration(5)->success('Product Added to Cart Successful');
        return redirect()->back();
    }
    public function mycart(){
        if(Auth::id()){
            $user = Auth::user();
            $userId= $user->id;
            $count = Cart::where('user_id',$userId)->count();
            $cart = Cart::where('user_id',$userId)->get();
        }
        return view('home.mycart',compact('count','cart'));
    }
    public function delete_cart($id){
        $data = Cart::find($id);
        toastr()->closeOnHover(true)->closeDuration(5)->success("Delete Successful");
        $data->delete();
        return redirect()->back();
    }
    public function confirm_order(Request $request){
        $name = $request->name;
        $address = $request->address;
        $phone = $request->phone;
        $user_id = Auth::user()->id;
        $cart = Cart::where('user_id',$user_id)->get();
        foreach($cart as $carts){
            $order = new Order;
            $order->name = $name;
            $order->rec_address = $address;
            $order->phone = $phone;
            $order->user_id = $user_id;
            $order->product_id = $carts->product_id;
            $order->save();
        }
        $cart_remove = Cart::where('user_id',$user_id)->get();
        foreach($cart_remove as $remove){
            $data = Cart::find($remove->id);
            $data->delete();
        }
        toastr()->closeOnHover(true)->closeDuration(5)->success("Order Successful");
        return redirect()->back();
    }
    
}
