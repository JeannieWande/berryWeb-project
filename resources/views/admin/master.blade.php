<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/master.css') }}">
  @stack('styles')

</head>
<body>
    <nav>
        <ul>
            <li><a href="{{ url('/admin') }}">Home</a></li>
            <li><a href="{{ url('admin/category') }}">ADD CATEGORY</a></li>
            <li><a href="{{ url('admin/product') }}">ADD PRODUCTS</a></li>
        </ul>
    </nav>
    
    <div id="wrapper">
        @yield('content')
    </div>
    
</body>
</html>