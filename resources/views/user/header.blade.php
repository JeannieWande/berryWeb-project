<header>
    <nav>
        <div class="main-nav">
            <div class="logo">wandy's BerryFarm</div>
            <div class="nav-links">
                <a href="{{ route('welcome') }}">home</a>
    
                <div class="dropdown">
                    <button class="dropbtn">Our Products</button>
                   
                        <div class="dropdown-content">
                       
                            @foreach ($categories as $item)           
                                <a href="{{url('/categoryProducts',$item->id) }}">{{ $item->category_name }}</a>
                            @endforeach 
                         
                        </div>
                   
                  
                </div>
             
                <a href="{{ url('/guide') }}">Farming Guide</a>
            </div>
            <div class="cart">
                <a href="{{ url('/cart') }}">Cart <i class="fa-solid fa-cart-shopping"></i></a>

                <span class="cart-count">{{ $cartCount }}</span>
               
            </div>
            
              <!-- Right Side Of Navbar -->
              <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                       
                           {{-- {{ Auth::user()->name }} --}} 
                        
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
  
        <!--<div class="sub-nav">
            <div class="sub-nav-p3">
                <a href="">About us</a>
                <a href="">our mission</a>
           
            </div>
            <div class="sub-nav-p2"><p>We offer Free delivery to wholesale purchasers!</p></div>
            <div class="sub-nav-p1"><p>contacts: 0767167152;</p></div>

        </div>-->
        
    </nav>
    
</header>