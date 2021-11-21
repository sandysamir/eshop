<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{route('home')}}">E-Shop</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route('dashboard')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('categories')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('cart')}}">Cart <img src="https://img.icons8.com/material/18/ffffff/shopping-cart--v1.png"/></a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{route('wishlist')}}">Wishlist <img class="mb-1" src="https://img.icons8.com/material/19/fa314a/like--v1.png"/></a>
          </li>
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
      <div class="dropdown">
          <a class="btn dropdown-toggle nav-link active" style="color: blanchedalmond;" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              {{ Auth::user()->name }}
          </a>
        
          <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuLink">
            <li><a class="dropdown-item nav-link " href="{{ route('logout') }}"style="color: blanchedalmond;"  onclick="event.preventDefault();    document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
            </li>
            <li>
              <a class="dropdown-item nav-link " href="{{ route('my-order') }}" style="color: blanchedalmond;"> 
                My orders
                </a>
            </li>
          </ul>
        </div>
   
      @endguest
        </ul>
      </div>
    </div>
  </nav>