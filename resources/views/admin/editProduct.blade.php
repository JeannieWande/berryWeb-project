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
    <form action="{{ route('adminProductUpdate', $productEdit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-input">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" name="product-name" value="{{ old('product_name', $productEdit->product_name) }}">
        </div>
        <div class="form-input">
            <label for="desc">Description</label>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder=" product Description">{{ old('description',$productEdit->description) }}</textarea>
        </div>

        <div class="form-input">
            <label for="old_image">Old Image:</label>
            @if($productEdit->image)
                <img style="width: 100px"; height="100px;" src="{{ Storage::url('public/images/'. basename($productEdit->image))}}" alt="Old Image">
            @else
                <p>No old image available</p>
            @endif
        </div>

        <div class="form-input">
            <label for="image">Image:</label>
            <input type="file" name="image" id="image" >
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
            <input type="number" name="retail" id="retail" value="{{ old('retail_price', $productEdit->retail_price) }}">
        </div>

        <div class="form-input">
            <label for="wholesale">wholesale price:</label>
            <input type="number" name="wholesale" id="wholesale" value="{{ old('wholesale_price', $productEdit->wholesale_price) }}">
        </div>
        <div class="form-input">
            <label for="stock">stock</label>
            <input type="number" name="stock" id="stock" value="{{ old('stock_amount', $productEdit->stock_amount) }}">
        </div>
       
        <button type="submit">add Product</button>
        <a href="{{ route('adminProductIndex') }}"><button type="button">Cancel</button></a>
    </form>
</div>  
@endsection