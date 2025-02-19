<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;
use App\Models\Order;
use App\Models\User;


class AdminController extends Controller
{
    public function index(){
        $orders = Order::paginate(5);
        $orders->withPath('admin');
        return view('admin.index',compact('orders'));
    }
    public function view_category(){
        $data = Category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request)
    {
        if (!$request->category) {
            toastr()->error('Please Enter the Category Name');
            return redirect()->back();
        }
        $category = new Category;
        $category->category_name = $request->category;
        $category->save();
        
        toastr()->closeOnHover(true)->closeDuration(5)->success('Category Added Successful');
        return redirect()->back();
    }

    public function delete_category($id){
        $data = Category::find($id);
        toastr()->closeOnHover(true)->closeDuration(5)->success("Delete $data->category_name Successful");
        $data->delete();
        return redirect()->back();
    }
    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category',compact('data'));
    }
    public function update_category(Request $request,$id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        toastr()->closeOnHover(true)->closeDuration(5)->success("Edit $data->category_name Successful");
        return redirect('/view_category');
    }
    public function add_product(){
        $category = Category::all();
        return view('admin.add_product',compact('category'));
    }
    public function upload_product(Request $request){
        $data = new Products;
        $data->title = $request->title;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->closeOnHover(true)->closeDuration(5)->success("Add Product Successful");
        return redirect()->back();
    }
    public function view_product(){
        $product = Products::paginate(5);
        $product->withPath('view_product');
        return view('admin.view_product',compact('product'));
    }
    public function delete_product($id){
        $data = Products::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        toastr()->closeOnHover(true)->closeDuration(5)->success("Delete $data->category_name Successful");
        $data->delete();
        return redirect()->back();
    }
    public function update_product($id){
        $data= Products::find($id);
        $category = Category::all();
        return view('admin.update_product',compact('data','category'));
    }
    public function edit_product(Request $request,$id){
        $data = Products::find($id);
        $data->title = $request->title;
        $data->price = $request->price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
        $image = $request->image;
        if($image){
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        toastr()->closeOnHover(true)->closeDuration(5)->success("Product Update Successful");
        return redirect ('/view_product');
    }
    public function product_search(Request $request){
        $search = $request->search;
        $product = Products::where('title','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.view_product',compact('product'));
    }
    public function order_search(Request $request){
        $search = $request->search;
        $orders = Order::where('name','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.index',compact('orders'));
    }
    public function view_user(){
        $users = User::paginate(10);
        return view('admin.users', compact('users'));
    }
    public function user_search(Request $request){
        $search = $request->search;
        $users = User::where('name','LIKE','%'.$search.'%')->paginate(3);
        return view('admin.users',compact('users'));
    }
    public function delete_user($id){
        $data = User::find($id);
        toastr()->closeOnHover(true)->closeDuration(5)->success("Delete Successful");
        $data->delete();
        return redirect()->back();
    }
    public function edit_user($id){
        $data = User::find($id);
        return view('admin.edit_user', compact('data'));
    }
    public function update_user(Request $request, $id){
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->address = $request->address;
        $data->password = $request->password;
        $data->usertype = $request->user_type;
        $data->save();
        toastr()->closeOnHover(true)->closeDuration(5)->success("User Updated Successfully");
        return redirect('/view_user');
    }
    public function delivered($id){
        $data = Order::find($id);
        $data->status = 'Delivered';
        $data->save();
        return redirect('/admin');
    }
    public function delivering($id){
        $data = Order::find($id);
        $data->status = 'Delivering';
        $data->save();
        return redirect('/admin');
    }
}
