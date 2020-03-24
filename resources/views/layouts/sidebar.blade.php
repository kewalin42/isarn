
<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>
<body>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>ระบบคลังข้อความภาษาอีสาน</span>
        </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="" >
          <i class="fas fa-fw fa-table"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="nav-item ">
          <a class="nav-link " href="{{ route('insert.index') }}" >
            <i class="fas fa-plus-square"></i>
            <span>Insert</span>
          </a>
      </li>
      <li class="nav-item ">
        <a class="nav-link " href="{{ route('insertdocument.index') }}" >
          <i class="fas fa-plus-square"></i>
          <span>InsertDocument</span>
        </a>
    </li>
      {{-- <li class="nav-item ">
          <a class="nav-link " href="{{ route('register') }}" >
            <i class="fas fa-male"></i>
            <span>Register</span>
          </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">
          <i class="fas fa-lock">
          <span>Login</span></a>
      </li> --}}
    </ul>
</body>
</html>
