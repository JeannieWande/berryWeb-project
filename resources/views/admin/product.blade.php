@extends('admin/master')
@section('title', 'category')
@section('content')
<div class="product-container">
    @if(session('message'))
    <div class="alert alert-success" style="background-color: rgb(235, 80, 196)">
        {{ session('message') }}
    </div>
    @endif
    <h1>ADDING NEW PRODCTS</h1>
    <form action="{{ route('adminProductStore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-input">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" name="product-name">
        </div>
        <div class="form-input">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder=" product Description"></textarea>
        </div>

        <div class="form-input">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <div class="form-input">
            <label for="category">SELECT PRODUCT CATEGORY:</label>
          
            <select name="category" id="category">
                @foreach ($adminCategories as $item)
                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
            </select> 
   
           
        </div>
        <div class="form-input">
            <label for="retail">retail price:</label>
            <input type="number" name="retail" id="retail">
        </div>

        <div class="form-input">
            <label for="wholesale">wholesale price:</label>
            <input type="number" name="wholesale" id="wholesale">
        </div>
        
        <div class="form-input">
            <label for="stock">stock</label>
            <input type="number" name="stock" id="stock">
        </div>
       
        <button type="submit">add Product</button>
    </form>
    <table>
        <tr>
            <th>id</th>
            <th>category_id</th>
            <th>product_name</th>
            <th>description</th>
            <th>retail_price</th>
            <th>wholesale_price</th>
            <th>Available in stock</th>
            <th>image</th>
            <th>deletion</th>
            <th>Edit</th>
        </tr>
        
@foreach($adminProducts as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->category_id }}</td>
    <td>{{ $item->product_name}}</td>
    <td>{{ $item->description}}</td>
    <td>{{ $item->retail_price }}</td>
    <td>{{ $item->wholesale_price }}</td>
    <td>{{ $item->stock_amount }}</td>


    <td><img  src="{{ Storage::url('public/images/'. basename($item->image) )}}" style="width: 100px; height:80px; " alt="" srcset=""></td>
    <td>
        <form action="{{ route('adminProductDestroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </td> 
    <td>
        <a href="{{ url('/admin/product', $item->id) }}"><button>Edit</button></a>
    </td>
</tr>
@endforeach
    
    </table>
</div>
    
@endsection