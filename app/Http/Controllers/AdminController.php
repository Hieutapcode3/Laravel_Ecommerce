<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Products;


class AdminController extends Controller
{
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
        $data->description = $request->description;
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
        $data->description = $request->description;
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
}
