@extends('user.master')

@section("title", "wandy's Farm" )

@section('specific')
  <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">
@endsection
   
@section('content')
<div class="cart">
  <h1 style=" font-family:arial;">Shopping Cart</h1>
  <a style="text-decoration: none; background-color:blue; color:white; padding:10px; border-radius:5px;" href="{{ url('/') }}">Go back to shop</a>

  <h2 style="color:rgb(114, 114, 250); font-family:arial;">Your cart contains {{ $cartCount }} items</h2>

 
 <div class="cart-wrapper">
  <div class="c-w">
    @foreach ($carts as $item)
 
    <div class="cart-container">      
        <div class="cartImg"> <img src="{{ Storage::url('public/images/'. basename($item['image']) )}}" alt="strawberriesImg" srcset=""></div>

        <div class="cartData">
          <h2>{{ $item['name']}}</h2>
          <h3 >price: <span style="color: orange;">{{ $item['productTotal']}}Tsh</span></h3>
          <h2>Quantity:{{ $item['quantity']}}Kg</h2>
           
        </div>
        <form action="{{ route('cart.delete',$item['id']) }}" method="post">
          @csrf
          @method('delete')
          <button>Delete</button>
        </form>
    </div> 
       

       


   @endforeach
  </div>
  

           <div class="total-price">
            <p>Total</p>
             <h3><span style="color: orange;">{{ $total }}Tsh </span></h3>
             
     
              <a href="{{ url('/checkout') }}"> <button>Proceed to checkout</button>  </a>
    
           </div>
 </div>
 
</div>

          
     
@endsection

