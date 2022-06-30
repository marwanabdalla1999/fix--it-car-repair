@include('backend.layouts.header')
@include('backend.layouts.footer')
@include('backend.layouts.nav')
@include('backend.layouts.top-nav')

@yield('header')
@yield('nav')

@yield('top')
@yield('content')
@yield('footer')