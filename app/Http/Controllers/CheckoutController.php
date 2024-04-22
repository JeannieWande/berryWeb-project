<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\user;
use App\Models\order;


class CheckoutController extends Controller
{
   public function __construct(){
      $this->middleware('auth.checkout');
   }
   public function index(){
      if(order::where('user_id', auth()->id())->exists()){
         return redirect()->route('order.index');

     }else{
      
      return view('user/checkout');

     }

  
   }

  
}
