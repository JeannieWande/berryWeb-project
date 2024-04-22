<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use Illuminate\Support\Facades\Storage;


class ProductController extends Controller
{
    public function adminProIndex(){
        $adminProducts=product::all();
        $adminCategories=category::all();
        return view('admin.product', compact('adminProducts', 'adminCategories'));

    }
    public function adminProStore(Request $request){
           //validation
           $validated=$request->validate([
            'product-name'=>'required|string',
            'desc'=>'required|string',
            'image'=>'required|image',
            'retail'=>'required|numeric',
            'wholesale'=>'required|numeric',
        ]);
        //save all data in DB
        $product=new product;
        $product->category_id=$request->input('category');
        $product->product_name=$request->input('product-name');
        $product->description=$request->input('desc');
        $product->retail_price=$request->input('retail');
        $product->wholesale_price=$request->input('wholesale');
        $product->stock_amount=$request->input('stock');

        $product->image=$request->file('image')->store('public/images');//saving the path of image in DB
        $product->save();
        return redirect()->route('adminProductIndex')->with('message', 'Product was added successfully');

    }
    public function adminProDestroy($id){
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
          return redirect()->route('adminProductIndex')->with('message', 'you deleted a product');
    }
    public function adminProEdit($id){
        $productEdit=product::find($id);
        //dd($productEdit);
        $adminCategories=category::all();
        return view('admin/editProduct', compact('productEdit', 'adminCategories'));

    }
    public function adminProUpdate(Request $request, $id){
            //validation
            $validated=$request->validate([
                'product-name'=>'required|string',
                'desc'=>'required|string',
                'image'=>'required|image',
                'retail'=>'required|numeric',
                'wholesale'=>'required|numeric',

            ]);
            //save all data in DB
            $productUpdate=product::findOrFail($id);
            $productUpdate->category_id=$request->input('category');
            $productUpdate->product_name=$request->input('product-name');
            $productUpdate->description=$request->input('desc');
            $productUpdate->retail_price=$request->input('retail');
            $productUpdate->wholesale_price=$request->input('wholesale');
            $productUpdate->stock_amount=$request->input('stock');
            $productUpdate->image=$request->file('image')->store('public/images');//saving the path of image in DB
            $productUpdate->save();
            return redirect()->route('adminProductIndex')->with('message', 'Product was updated successfully');
   
     
    }
    public function singleProductPage($id){
        $productpage=product::where('id', $id)->get();
        return view('/user.singleProductPage', compact('productpage'));
    }   

    public function categoryProducts($id){
        $products=product::where('category_id', $id)->get();
        return view('user/categoryProducts', compact('products'));

    }
    public function displayProduct($id){
        $product=product::where('id', $id)->get();
        return response()->json($product);
     
    } 
  
    


    
   


}



