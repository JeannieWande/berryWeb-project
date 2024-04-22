<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;

class OrderController extends Controller
{
    public function __construct(){
        $this->middleware('auth.checkout');
     }
    public function store(Request $request){
        if(order::where('user_id', auth()->id())->exists()){
            return redirect()->back()->with('error', 'Dear user you have already submitted form');

        }
        //dd($request->all());
        $validated=$request->validate([
            'fname'=>'required|string',
            'lname'=>'required|string', 
            'email'=>'required|email',
            'pNumber' =>'required|numeric',
            'region'=>'required|string',
            'district'=>'required|string',
            'ward'=>'required|string',
            'street'=>'required|string',

        ]);
       

        $order=new order;
        $order->firstname=$request->input('fname');
        $order->lastname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phonenumber=$request->input('pNumber');
        $order->region=$request->input('region');
        $order->district=$request->input('district');
        $order->ward=$request->input('ward');
        $order->street=$request->input('street');
        $order->user_id=auth()->id();
        $order->save();
       
        
        return redirect()->route('order.index' );
     
    }
    public function index(){
        $cart = session()->get('cart', []);
        $total=0;
            foreach ($cart as $item) {
              $total+=$item['productTotal']; 
               
            }
        $cartCount=count($cart);
        $orderDatas=order::where('user_id', auth()->id())->get();
      
        return view('user.orderDisplay' , compact('orderDatas','total', 'cart'));

    }
   
}
