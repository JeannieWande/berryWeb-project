@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/productPage.css') }}">  
@endsection
@section('content')
<div class="product-container">
    @foreach ($productpage as $item)
    <div class="wrapper">
        <div class="col1">
            <img src="{{ Storage::url('public/images/'. basename($item->image) )}}" alt="">
        </div>
        
        <div class="col2">
            <h2>{{ $item->product_name }}</h2>
            <hr>
            <h3 class="price">{{ $item->price }}<small>TSH</small></h3>
            <h3 class="desc">Description</h3>
            <p>{{ $item->description }}</p>
            <ul>
                <p style="font-weight: bold"> Nutrional benefits</p>
                <li>Rich in Vitamin C</li>
                <li>Rich in Vitamin A</li>
                <li>Rich in Vitamin D</li>
                <li>Rich in Vitamin F</li>

            </ul>
        
                <table>
                    <tr>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                    <tr class="quant-price">
                        <td>5</td>
                        <td class="td-price">60000</td>
                    </tr>
                    <tr class="quant-price">
                        <td>3</td>
                        <td class="td-price">45000</td>
                    </tr>
                    <tr class="quant-price">
                        <td>7</td>
                        <td class="td-price">84000</td>
                    </tr>
                    <tr class="inp-btn">
                        <td>200*product</td>
                        <td>200000</td>
                    </tr>
                    <tr class="inp-btn">
                        <td><input class="input" type="number" min="10"></td>
                        <td><button type="submit">ADD TO CART</button></td>
                    </tr>
                    <!-- Add more rows as needed -->
                </table>
                <hr>
                <h4>category: fruits</h4>
            
  
        </div>
        <div class="col3">
            <div class="box">
                <small>Need Help?</small> 
                <p>0755839388</p>
            </div>
            <div class="box">
                <small>Email us:</small>
               <p>WandyBerries@gmail.com</p>
            </div>
            <div class="box">
                <small>Free transprtation:</small>
                <p>Shippings & returns</p>
            </div>
            <div class="box">
                <small>Business Hours:</small>
                <p>Monday-Friday</p>
                <p>7Am-6Pm</p>
            </div>
        </div>
    </div>
            
    @endforeach
</div>
    
@endsection
