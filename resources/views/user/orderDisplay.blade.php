@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">  
@endsection
@section('content')
<div class="order-container">
    <div class="addressWrapper">
        <a style="text-decoration: none; background-color:blue; color:white; padding:5px; border-radius:5px;" href="{{ url('/') }}">Go back to shop</a>
        <h2>Delivery Address</h2>
        @foreach ($orderDatas as $data)
            <div class="addressData">
                <p class="name">{{ $data->firstname }} {{ $data->lastname }}</p>
                <p>{{ $data->street }}, {{ $data->ward }}, {{ $data->district }}</p>
                <p> {{ $data->region }}</p>
                <p>{{ $data->phonenumber }}</p>
                <p>{{ $data->email }}</p>
            </div>
            
        @endforeach
        
    </div>
    
    <h1>Shopping Cart</h1>
    
    <div class="cart-wrapper">
         @foreach ($cart as $item)
             <div class="cart-container">      
                 <div class="cartImg"> <img src="{{ Storage::url('public/images/'. basename($item['image']) )}}" alt="strawberriesImg" srcset=""></div>
    
                 <div class="cartData">
                    <h2>{{ $item['name']}}</h2>
                    <h3 >price: <span style="color: orange;">{{ $item['productTotal']}}Tsh</span></h3>
                    <h2>Quantity:{{ $item['quantity']}}Kg</h2>
                 
                 </div>
             </div>  
              
         @endforeach
       
       
    
             <button>Continue</button> 
             <div class="total-price">
                <p>Total</p>
                <h3><span style="color: orange;">{{ $total }}Tsh </span></h3>
                
        
                 <a href="{{ url('/checkout') }}"> <button>Continue</button>  </a>
       
              </div>
    
     
      
    
    </div>
        
    </div>

</div>





    
@endsection