<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{url('/dashboard')}}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('category')}}">Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('cart')}}">Cart<span class="badge text-bg-danger mx-1 cart_count"></span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{url('my_orders')}}">My Orders</a>
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
          <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                  {{ Auth::user()->name }}
              </a>

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
      </div>
    </div>
  </nav>
<!-- official jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- official jquery -->
  <script>
    $(document).ready(function(){
      loadcart();
     function loadcart() { 
$.ajax({
  type: "GET",
  url: "/load_cart_data",

  success: function (response) {
    
    $('.cart_count').html('');
    $('.cart_count').html(response.count);
    
  }
});
      }
        
        

      });
   
  </script>
