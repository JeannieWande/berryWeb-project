@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/products.css') }}">  
@endsection
@section('content')
<h1><small>Product:</small>STRAWBERRIES</h1>
<div class="berries-container">
    @foreach ($products as $item)
    <div class="b-wrapper">
        <div class="b-image">
           <img src="{{ Storage::url('public/images/'. basename($item->image) )}}" alt="strawberriesImg" srcset="">
        </div>
        <div class="b-data">
            <h3 class="name"><a href="{{ url('/productPage', $item->id) }}">{{ $item->product_name }}</a></h3>
            <h3 class="price">{{ $item->price }}</h3>
            <a href="{{ url('/productPage', $item->id) }}"><button type="submit">Purchase</button></a>
        </div>
      
    </div>
        
    @endforeach
   
</div>



@endsection