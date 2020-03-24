
<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">

<head>
  @include('layouts.head')
</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-5" href="index.blade.php">ระบบจัดการคลังข้อความภาษาอีสาน</a>
    <!-- Navbar -->
    {{-- <ul class="navbar-nav ml-auto ml-md-0"> --}}
      {{-- <li class="nav-item dropdown no-arrow"> --}}
        {{-- <a class="nav-link dropdown-toggle" href="{{route('login')}}" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        
        <div class="dropdown-menu drmenu-rightopdown-" aria-labelledby="userDropdown">
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div> --}}
        
        @if (Auth::guest())
                          
                            <li><a href="{{ route('login') }}"><i class="fas fa-lock"></i>Login</a></li>
                            <li><a href="{{ route('register') }}"><i class="fas fa-user-circle"></i>Register</a></li>
                            
                        @else
                            <li class="dropdown">

                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <i class="fas fa-unlock"></i>Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                </ul>
                            </li>
                        @endif
                        
      {{-- </li> --}}
    {{-- </ul> --}}

  </nav>
</body>
<html>