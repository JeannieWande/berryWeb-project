@extends('admin/master')
@section('title', 'category')
@section('content')
<div id="categoryContainer">
    @if(session('message'))
    <div class="alert alert-success">
    {{ session('message') }}
    @endif
    
       <form action="{{ route('category.store') }}" method="post">
          @csrf
          <h1>ADD NEW CATEGORY</h1>
          <div class="cat-data">
              <label for="categoryName">Category Name:</label>
              <input type="text" id="categoryName" name="categoryName">
          </div>
              <button type="submit">Add new Category</button>  


        </form>


<!--display data stored in database-->
       <table>
            <tr>
               <th>id</th>
               <th>Category_Name</th>
               <th>Deletion</th>
            </tr>
            @foreach ($categoryData as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->category_name }}</td>
               
                <td>
                    <form action="{{ route('category.destroy', $item->id) }}" method="post">
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