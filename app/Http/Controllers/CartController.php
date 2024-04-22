<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\product;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class CartController extends Controller
{

    public function show(){
            //session()->flush();
       
            $carts=session()->get('cart',[]);
            $total=0;
            foreach ($carts as $item) {
              $total+=$item['productTotal'];    
            }
            //dd($total);  
            $cartCount=count($carts);

              
            return view('user/cart', compact('carts', 'cartCount', 'total'));
    }

 
    public function addToCart(Request $request){
     
        $productId = $request->input('productId');
        $productName = $request->input('productName');
        $productImg = $request->input('productImg');
        $productTotal=$request->input('productTotal');
        $quantity=$request->input('quantity');
      
        $cart = session()->get('cart', []);
        $cart[$productId]=[
             'id'=>$productId,
            'name'=>$productName,
            'image'=>$productImg,
            'productTotal'=>$productTotal,
            'quantity'=>$quantity,
          
        ];
      
        
        session()->put('cart', $cart);
       

        return redirect()->route('cart.show')->with('success', 'product added successfully');
     }
     public function destroy($id){
    
       $cart= session::get('cart', []);
      // dd($deleteCartData);
      if(isset($cart[$id]))
      {
        unset($cart[$id]);
        session()->put('cart',$cart);
      }
       return redirect()->route('cart.show');
    

     }
 
   

  
        
    
}








