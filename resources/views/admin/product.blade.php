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
    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
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
            <label for="price">Price:</label>
            <input type="number" id="price" name="price">
        </div>
        <div class="form-input">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>
        <div class="form-input">
            <label for="category">SELECT PRODUCT CATEGORY:</label>
          
            <select name="category" id="category">
                @foreach ($categories as $item)
                <option value="{{ $item->id }}">{{ $item->category_name }}</option>
                @endforeach
            </select> 
   
           
        </div>
       
        <button type="submit">add Product</button>
    </form>
    <table>
        <tr>
            <th>id</th>
            <th>category_id</th>
            <th>product_name</th>
            <th>description</th>
            <th>price</th>
            <th>image</th>
            <th>deletion</th>
        </tr>
        
@foreach($products as $item)
<tr>
    <td>{{ $item->id }}</td>
    <td>{{ $item->category_id }}</td>
    <td>{{ $item->product_name}}</td>
    <td>{{ $item->description}}</td>
    <td>{{ $item->price }}</td>
    <td><img  src="{{ Storage::url('public/images/'. basename($item->image) )}}" style="width: 100px; height:80px; " alt="" srcset=""></td>
    <td>
        <form action="{{ route('product.destroy', $item->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit">delete</button>
        </form>
    </td> 
</tr>
@endforeach
    
    </table>
</div>
    
@endsection