@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">  
@endsection
@section('content')
<div class="berries-wrapper">
    <div class="p-top">
        <a href="{{ url('/') }}"> Go to Home Page</a>
     
    </div>
    
    <div class="berries-container">
        @foreach ($products as $item)
        <div class="p-wrapper">
            <div class="p-d-wrapper">
                <div class="p-image">
                    <img src="{{ Storage::url('public/images/'. basename($item->image) )}}" alt="strawberriesImg" srcset="">
                 </div>
                 <div class="p-data">
                     <h3 class="name"><a href="{{ url('/singleProductPage', $item->id) }}">{{ $item->product_name }}</a></h3>   
                 </div>
            </div>
            <div class="desc-wrapper">
                <p style="font-weight: 900;">{{ $item->product_name }}</p>
               <small style="font-weight: 900;">Product Info</small>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Voluptate iste ullam provident tempore temporibus. Delectus minima neque error dolorem unde cum illo, rerum tempore facilis distinctio, provident corporis fugiat velit.</p>
                
                <ul>
                    <h3>Nutritional benefit</h3>
                    <li>Lorem ipsum, dolor sit amet consectetur</li>
                    <li>Lorem ipsum, dolor sit amet consectetur</li>
                    <li>Lorem ipsum, dolor sit amet consectetur</li>
                    <li>Lorem ipsum, dolor sit amet consectetur</li>

                </ul>
                <a href="{{ url('/singleProductPage', $item->id) }}"><button type="submit" class="p-btn">Buy</button></a>
            </div>
            
          
        </div>
            
        @endforeach
       
    </div>
    

</div>



@endsection