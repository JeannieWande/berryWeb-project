<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <title>@yield('title')</title>
    <script src="https://kit.fontawesome.com/2e9efed9fe.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <!--<link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    -->
    <!-- Scripts -->
   {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}} 
   @yield('specific')
   
    @stack('style')
</head>
<body>
    <header>
        <nav>
            <div class="logo">wandy's BerryFarm</div>
            <div class="nav-links">
                <a href="{{ url('/homepage') }}">Home</a>
                <a href="">Our Products</a>
                <a href="">Farming Guide</a>
            </div>
            <div class="cart">
                <a href="">Cart</a>
            </div>
            <div class="registration">
                <a href="">LOG IN</a>
                <a href="">REGISTER</a>
            </div>
        </nav>
    </header>

    <div id="content">
        @yield('content')
    </div>

    <footer>
        <div class="footer-container">
            <div class="footerEmail">
                <h2>wandy's BerryFarm</h2>
                <p>get the latest updates of new incoming products</p>
                <input type="email" name="email" id="email" placeholder="Enter Email">
            </div>
            <div class="footerLinks">
                <ul>
                    <h3>information</h3>
                    <li>About Us</li>
                    <li>Delivery information</li>
                    <li>privacy policy</li>
                    <li>store location</li>
                    
                </ul>
                <ul>
                    <h3>My Account</h3>
                    <li>My account</li>
                    <li>Discount</li>
                    <li>Personal information</li>
                    <li>My address</li>
                    
                </ul> 
                <ul>
                    <h3>Contact Info</h3>
                    <li>markrussell@example.com</li>
                    <li>No 40 Baria Sreet 133/2, NewYork</li>
                    <li>(785) 977 5767</li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>