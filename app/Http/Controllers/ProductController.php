<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;


class ProductController extends Controller
{
    public function products($id){
        $products=product::where('category_id', $id)->get();
      
        return view('user/products', compact('products'));

    }
    public function productpage($id){

        $productpage=product::where('id', $id)->get();
     
        return view('/user.productPage', compact('productpage'));

    }
    
    public function index(){
        $products=product::all();
        $categories=category::all();
        return view('/admin/product', compact('products', 'categories'));

    }
    public function store(Request $request){
        //validation
        $validated=$request->validate([
            'product-name'=>'required|string',
            'desc'=>'required|string',
            'price'=>'required|numeric',
            'image'=>'required|image',
        ]);
        //save all data in DB
        $product=new product;
        $product->category_id=$request->input('category');
        $product->product_name=$request->input('product-name');
        $product->description=$request->input('desc');
        $product->price=$request->input('price');
        $product->image=$request->file('image')->store('public/images');//saving the path of image in DB
        $product->save();
        return redirect()->route('product.index')->with('message', 'Product was added successfully');
    }
    public function destroy($id){
        //getting the id of product to be deleted.
        $product= product::find($id);

        if(!$product){
            return redirect()->back()->with('message','category not found');
        }
        $maxId=product::max('id');
        //deleting the product
        $product->delete();
        //auto incrementing the id to 1 if prodct is deleted
        if($id ==$maxId){
         
            \DB::statement('ALTER TABLE products AUTO_INCREMENT= 1');
        }
        return redirect()->route('product.index')->with('message', 'you deleted a product');

    }
}
