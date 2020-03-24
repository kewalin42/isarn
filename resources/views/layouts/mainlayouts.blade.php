
<!DOCTYPE html>
<html lang="{{ str_replace('_','-', app()->getLocale()) }}">

<head>
    @include('layouts.head')
</head>
<body >
    <div id="topbar-wrapper" >
        <!-- Top bars Wrapper -->
        @include('layouts.topbar')
        

        <div id="sidebar-wrapper">
            <!-- sidebar Wrapper -->
            @include('layouts.sidebar')
            @yield('content')
        </div>
        <div id="sidebar-wrapper">
            {{-- <!-- footer-->
            @include('layouts.footer')
        </div>
    </div>

    <!-- footer-->
    @include('layouts.javascript') --}}
</body>
</html>