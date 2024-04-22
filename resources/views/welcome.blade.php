@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
  <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">
@endsection

@section('content')
<div class="top-image-wrapper">
    <div class="top-text">
       
        <h1>Get fresh <span style="color:  yellow;">organic strawberries, Strawberry Seedlings </span>and <span style="color: yellow">seeds</span> at Lower Prices</h1>
     <!--   <button class="top-btn" type="button">Buy Now</button>-->
    
    </div>
    <div class="top-img">
        <img src="{{ asset('berryImg/berry8.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
</div>
<hr>
<h3 class="extra-txt">We sell strawberry fruits,strawberry seeds and strawberry seedlings</h3>
<!--top service section-->
<div class="top-services-wrapper">
   
    <div class="top-services-col2">
        <div class="services">
            <i class="fa-solid fa-truck"></i>
            <h3>Free delivery</h3>
            <p>On all customers in Mwanza</p>
        </div>
        <div class="services">
            <i class="fa-solid fa-building-shield"></i>
            <h3>Return policy</h3>
            <p>Money back guarantee</p>
        </div>           
        <div class="services">
            <i class="fa-solid fa-book-open"></i>
            <h3>farming Guide</h3>
            <p>Resourcefull insights</p>
        </div>           
        <div class="services">
            <i class="fa-solid fa-shield-halved"></i>
            <h3>Secure Payment</h3>
            <p>Secure System</p>
        </div>
    </div>
    
</div>
@php
    use Illuminate\Support\Facades\Storage;
@endphp
<!--Front product-->
<h2 style="text-align:center; font-family:sofia sans-serif; font-size:40px;">Our  Products</h2>
<div class="front-product-container">
       @if(isset($products))
       <div class="row">
        @foreach($products as $chunk)
        @foreach ($chunk as $item)
        <div class="column">
            <div class="front-product">
                <div class="front-product-inner">
                    <img src="{{storage::url('public/images/'.basename($item->image)) }}" alt="strawberriesImg" srcset="">
                    <div class="front-product-detail">
                        <p class="p_Name">{{ $item->product_name }}</p>
                        <p class="p_Price"><small class="r_P">Retail-price: </small><span class="priceP">{{ $item->retail_price }}</span>Tsh</p>
                        <span>Quantity</span><a href="{{ url('/singleProductPage', $item->id) }}"><button type="submit" class="productBtn" productId="{{$item->id}}" >1Kg  <i class="fa-solid fa-chevron-down"></i></button></a>
                    </div>
                </div>
               
            </div>  
        </div>
            
        @endforeach
        @endforeach 
       </div>
      @endif  
</div>

<div class="middle-text">
    <div class="middle-txt-img">
        <img src="{{ asset('berryImg/berry9.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
    <div class="middle-text-txt">
        <p>
           Tasty organic strawberries for good Health <br> Buy today and get 13%Off
        </p>
        
    </div>
</div>


<!--front page category section-->
<div class="category-wrapper">
       <h3 class="our-cat">Our categories</h3>
        <p class="our-cat2">What we're offering to our customers</p>
    <div class="category-container">  
        @if(isset($categories))
            @foreach($categories as $item)
        
                <div class="category">
                    <img src="{{ Storage::url('public/images/'. basename($item->category_image) )}}" alt="strawberriesImg" srcset="">
                    <div class="category-details">
                    <p> <a href="{{url('/categoryProducts',$item->id) }}">{{ $item->category_name }}</a></p>
                    </div>  
                </div>
            @endforeach 
        @endif    
    </div>
</div>

<div class="middle-text">
   
    <div class="middle-text-txt">
        <p>
           Tasty organic strawberries for good Health <br> Buy today and get 13%Off
        </p>
        
    </div>
    <div class="middle-txt-img">
        <img src="{{ asset('berryImg/berry14.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
</div>



<!--the first image to text paragraph-->
<div class="lower-section">
    <div class="col-img">
        <img src="{{ asset('berryImg/berry13.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
    <div class="col-txt">
        <h3>Productive strawberry farming</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
             A, necessitatibus quia? Quasi sunt quae nostrum id, 
             ducimus blanditiis eius mollitia consectetur minus, 
            debitis est! Corporis dicta cupiditate quibusdam ad ratione?
        </p>
        
        <button><a href="{{ url('/guide') }}">Discover more</a></button>
    </div>
</div>
<div class="lower-section">
    
    <div class="col-txt">
        <h3>Grow with us</h3>
        <p> 
            
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
             A, necessitatibus quia? Quasi sunt quae nostrum id, 
             ducimus blanditiis eius mollitia consectetur minus, 
            debitis est! Corporis dicta cupiditate quibusdam ad ratione?
        </p>
    
        <button><a href="{{ url('/guide') }}">Discover more</a></button>
    </div>
    <div class="col-img">
        <img src="{{ asset('berryImg/berry11.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
</div>
@endsection
@include('user.header')  


<script>
   document.addEventListener('DOMContentLoaded', function(){
        const frontbtn= document.querySelectorAll('.productBtn');
        const myModal=document.getElementById('.modal');
        const modalImage=document.getElementById('popupImg');
        var imageSrc = "{{ Storage::url('public/images/') }}"; 
        console.log(imageSrc);
       

        
       frontbtn.forEach(button => {
        button.addEventListener('click', function(){
            const productId=button.getAttribute('productId');
          
            fetch(`displayproduct/${productId}`)
            .then(response=>response.json())
            .then(data=>{
                let see =modalImage.src=imageSrc + data[0].image ;
                console.log(see);
             
              
                
             
           
                console.log(modalImage)
                
             
                
              

             

            })
            .catch(error=>{
                console.error('error',error);
            });
            const btn = document.createElement('button');
               btn.textContent='btton';

               myModal.appendChild(btn)
        });    
       });  
     
   });
</script>

