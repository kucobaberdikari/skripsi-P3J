<nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="{{route('Home')}}" class="navbar-brand">
        <img src="{{url('images/logo_tel-h.png')}}" alt="AdminLTE Logo" class="brand-image " style="opacity: .8">
      </a>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item ">
         <a class="nav-link" href="{{ asset('/') }}"><b>Home</b></a>
        </li>
        <li class="nav-item dropdown">
         <a class="nav-link" href="{{ asset('about') }}"><b>About</b></a>
        </li>
         <li class="nav-item dropdown">
         <a class="nav-link" href="{{ asset('contact') }}"><b>Contact</b></a>
        </li> 
        <li class="nav-item dropdown">
         <a class="nav-link" href="{{ asset('help') }}"><b>Help</b></a>
        </li>

      </ul>
    </div>
  </nav>