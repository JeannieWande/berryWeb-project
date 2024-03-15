@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
  <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
@endsection
@section('content')

<div class="top-image-wrapper">
    <div class="top-text">
        <small class="top-sm">Wandy's BerryFarm</small>
        <h1>Experience the sweet tasty flavour of our handpicked <br> fresh organic strawberries</h1>
        <br>
        <h2>Make that strawberry garden dream a reality With Our Premium strawberry Seeds and Strawberry Seedlings</h2>
      
        <button class="top-btn" type="button">Get started</button>
    
    </div>
    <div class="top-img">
        <img src="{{ asset('berryImg/berry4.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
</div>
<hr>
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

<!--front page product section-->
<div class="product-wrapper">
       <h3 class="our-cat">Our categories</h3>
        <h3>What we're offering to our customers</h3>
    <div class="product-container">  
            @foreach($categoryData as $item)
            <div class="product">
              <img src="{{ Storage::url('public/images/'. basename($item->category_image) )}}" alt="strawberriesImg" srcset="">
              <div class="product-details">
                <p> <a href="{{url('/products',$item->id) }}">{{ $item->category_name }}</a></p>
             </div>  
            </div>
            @endforeach

       
    </div>
</div>

<div class="middle-text">
    <p>
        "Discover the deliciously vibrant world of strawberries
        not just a treat for your taste buds, but a powerhouse of health
         benefits! Bursting with antioxidants, vitamins, and fiber, these 
         juicy gems are nature's sweet remedy for a healthier you."
    </p>

</div>
<!--the first image to text paragraph-->

<div class="image-txt-row">
    <div class="txt-col">
        <h3>Our Products</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Iusto labore tenetur obcaecati repudiandae cum at possimus porro modi facilis enim!
            Non porro fugit tempore ex pariatur possimus voluptatibus minus. Veniam.
            Lorem ipsum, dolor sit amet consectetur adipisicing elit.
            Quod blanditiis similique fugiat corrupti inventore porro consequuntur?
            Voluptatem nam id rerum debitis voluptates odit,
            quidem aliquid modi, similique quod neque deleniti!
        </p>
    </div>
    <div class="image-txt-col">
            <img src="{{ asset('berryImg/berry3.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
</div>
<!--the second image to text paragraph-->
<div class="image-txt-row">
    <div class="image-txt-col">
            <img src="{{ asset('berryImg/berry2.jpg') }}" alt="strawberriesImg" srcset="">
    </div>
    <div class="txt-col">
        <h3>Our Team</h3>
        <p>
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
            Iusto labore tenetur obcaecati repudiandae cum at possimus porro modi facilis enim!
            Non porro fugit tempore ex pariatur possimus voluptatibus minus. Veniam.
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
            Facilis ullam magnam delectus nemo sapiente soluta id molestias. 
            Ipsum labore, consectetur,ex voluptas soluta quidem ratione, 
            voluptatem quis sed quibusdam molestias?
        </p>
    </div> 
</div>
@endsection
      



   



   




      



   


