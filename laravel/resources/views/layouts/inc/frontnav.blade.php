<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('assets/images/logogss.png') }}" width="40px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
       
        <ul class="navbar-nav ms-auto">
          <div class="search-bar ">
            <form action="{{ url('searcproduct') }}" method="POST">
              @csrf
            <div class="input-group  ">
              <input type="search" class="form-control" id="search-product" name="product_name" required placeholder="Cari Produk"  aria-describedby="basic-addon1">
              <button type="submit" class="input-group-text"><i class="fa fa-search"></i></button>
            </div>
          </form>
          </div>
          @guest
          @if (Route::has('login'))
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
              </li>
          @endif

      @else
      <li class="nav-item dropdown alert-pay">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
           
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Profil Saya</a></li>
            <li><a class="dropdown-item" href="{{ ('my-orders') }}">Pesanan Saya</a></li>
            @auth          
            @if (Auth::user()->role_as == '1') 
            <li><a class="dropdown-item" href="{{ url('dashboard') }}">Dashboard</a></li>
            @endif
           
          
           
            @endauth                             
           
            <li><a class="dropdown-item" href="{{ route('logout') }} " 
               onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();" >
                 {{ __('Logout') }}</a>
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form> 
              </li>
          </ul>
        </li>
         
      @endguest
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('login') }}">login</a>
          </li> --}}
 
        
           
   
          <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">kategori</a>
          </li>
          
         
          <li  class="nav-item me-3 ms-3">
            <a class="position-relative"   href="{{ url('wishlist') }}"><i class="bi-heart icon-large text-warning" ></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border  border-light border-3 hati-count">
             0
              <span class="visually-hidden">unread messages</span>
            </span></a>
          </li>
          <li  class="nav-item">
            
          </li>
          <li  class="nav-item">
            <a class="position-relative"  href="{{ url('cart') }}"><i class="bi bi-cart3 icon-large text-warning" ></i> <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger border  border-light border-3 cart-count">
         
              <span class="visually-hidden">unread messages</span>
            </span></a>
            
          </li>
        </ul>
      </div>
    </div>
    
  </nav>