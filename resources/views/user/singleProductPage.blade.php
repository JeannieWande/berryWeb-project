@extends('user.master')
@section("title", "wandy's Farm" )
@section('specific')
   <link rel="stylesheet" href="{{ asset('css/allPages.css') }}">  
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
                    <form action="{{ route('addToCart') }}" method="post" enctype="multipart/form-data">
                         @csrf
                        <input type="hidden" name="productName" value="{{ $item->product_name }}">
                        <input type="hidden" name="productTotal" value="" id="productTotal">
                        <input type="hidden" name="productImg" value="{{ $item->image }}">
                        <input type="hidden" name="productId" value="{{ $item->id }}">
                        <input type="hidden" name="quantity" value="" id="quantity">

                       
                            
                           <p class="stock">Available in Stock {{ $item->stock_amount }}Kg</p>
                            <table id="table">
                               
                                <tr>
                                    <th></th>
                                    <th>Quantity(Kg)</th>
                                    <th>price</th>
                                </tr>
                        
                                <tr class="t-row">
                                    <td>At retail price</td>
                                    <td>&lt;100</td>
                                    <td>{{ $item->retail_price }}</td>
                                </tr>
                                <tr class="t-row">
                                    <td>At wholesale price</td>
                                    <td>100+</td>  
                                    <td>{{ $item->wholesale_price }}</td>
                                </tr>
                                <tr class="t-show">
                                    <td class="">Quantity*price</td>
                                    <td class="DisplayQP"></td>
                                    
                                </tr>
                                <tr class="t-show">
                                    <td>Total</td>
                                    <td class="showPrice"></td>
                                </tr>
                                <tr>
                                    <td><input id="input" type="number" value="" required placeholder="Enter quantity"></td> 
                                    <td><button type="submit" class="add-to-cart">add to cart</button></td>
                                
                                  
                                </tr>
                            </table>
                            @if(session('success'))
                               <div class="alert alert-success">
                              {{ session('success') }}
                              </div>
                            @endif
                    </form>
               
                     <hr>
                            <h4>category: fruits</h4>
            </div>
        <!--side information-->
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
<script>
    
document.addEventListener('DOMContentLoaded', function(){
 
  const table= document.querySelectorAll('.t-row');
  const input =document.getElementById('input')
  const showQP=document.querySelector('.displayQP');
  const showPrice=document.querySelector('.showPrice');
  const quantity=document.querySelector('#quantity');
  const total=document.querySelector('#productTotal');
  let productData=@json($productpage);
  
  let retailPrice=productData[0].retail_price;
  let wholesalePrice=productData[0].wholesale_price;
  let stock=productData[0].stock_amount;
  console.log(stock);


  table.forEach(function(data){

    data.addEventListener('click', function(){
       
        table.forEach(function(data){
            data.classList.remove('selected')
        });
        this.classList.add('selected')

        let selectedValue=this.cells[1].textContent;
        let selectedPrice=this.cells[2].textContent;
        console.log(selectedValue + ' ' + selectedPrice)

        if(selectedValue=='<100'){
            showQP.textContent= 1 + 'kg' + ' ' + 'of' + ' ' +productData[0].product_name + '*' + retailPrice;
            showPrice.textContent=1*retailPrice;
            input.value=1;
            quantity.value=1;
            total.value=1*retailPrice;
            
          
        } 
        else if(selectedValue=='100+'){
            showQP.textContent=  100 + 'kg' + ' '+ 'of'+ ' ' + productData[0].product_name + '*'+ wholesalePrice;
            showPrice.textContent=100*wholesalePrice;
            input.value=100;
            quantity.value=100;
            total.value=100*retailPrice;

        }  
    
    });
    //input  numbers
    input.addEventListener('input', inputFunc)
    function inputFunc(){
    
        if(input.value>0 && input.value<100){
            let inputValue=input.value;
            console.log(inputValue)
            showQP.textContent= inputValue+'kg' + ' '+ 'of'+ ' ' + productData[0].product_name + '*'+ retailPrice;
            showPrice.textContent=inputValue*retailPrice;
            quantity.value=inputValue;
            total.value=inputValue*retailPrice;

        }
        
        else if(input.value>=100 && input.value<=stock){
            let inputValue=input.value;
            console.log(inputValue)
            showQP.textContent= inputValue+'kg' + ' '+ 'of'+ ' ' + productData[0].product_name + '*'+ wholesalePrice;;
            showPrice.textContent=inputValue*wholesalePrice;
            quantity.value=inputValue;
            total.value=inputValue*wholesalePrice;


        }else if(input.value<=0){
            let inputValue=input.value;
            console.log(inputValue)
            showQP.textContent= 'Enter quantity';
            showPrice.textContent='null';
            quantity.value='';
            total.value='';

        }
        else if(input.value>stock){
            let inputValue=input.value;
            console.log(inputValue)
            showQP.textContent= 'Not available in stock';
            showPrice.textContent='';
            quantity.value='';
            total.value='';

        }
        else{
            showQP.textContent= '';
            showPrice.textContent='';
            quantity.value='';
            total.value='';

        }

    }
  });
});

//CART JS//
/*const button= document.querySelector('.add-to-cart');
button.addEventListener('click', addToCart)

function addToCart(productId){
    fetch('/cart',
    {
        method:'post',
        header:{
        'Content-Type':'application/json',
        'X-CRSF-TOKEN':document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    },
        body:JSON.stringify({product_id:productId})
    })
    .then(response=>response.json())
    .then(data=>{
       alert(data.message)

    })
    .catch(error=>{
        console.log(error)
    }

    )
}*/

</script>
