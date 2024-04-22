<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\category;
use App\Models\cart;



class homepageController extends Controller
{
    public function index(){
        $products=product::all()->chunk(4);
        $categories=category::all();
        //dd($categories);
       
        
        $carts=session()->get('cart',[]);
        $cartCount=count($carts);
       
        return view('welcome', compact('products', 'categories', 'cartCount'));
    }
    public function popup($id){
        $popup=product::where('id', $id)->get();
       // dd($popup);
        return view('welcome', compact('popup'));
    } 

   
   
      

}
