@extends('admin/master')
@section('title', 'category')
@section('content')
<div id="categoryContainer">
    @if(session('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    @endif
    
       <form action="{{ route('adminCatUpdate', $edit->id) }}" method="post" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <h1>Edit CATEGORY</h1>
          <div class="cat-data">
              <label for="categoryName">Category Name:</label>
              <input type="text" id="categoryName" name="categoryName" value="{{ old('name', $edit->category_name)  }}">
          </div>
          <div class="cat-data">
            <label for="image">Image:</label>
            <input type="file" name="categoryImage" id="image" value="{{ $edit->category_image }}">
          </div>
              <button type="submit">Save</button>  

        </form> 
        <a href="{{ Route('adminCatIndex') }}"><button type="button">cancel</button></a>
</div>
    
@endsection