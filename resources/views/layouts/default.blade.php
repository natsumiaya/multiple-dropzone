<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include ('plugins.css')
    @yield('css')
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        @include('layouts.sidebar')
        @include('layouts.topnav')
        <div class="right_col" role="main">
          <div class="">
            @yield('content')
          </div>
        </div>
        @include('layouts.footer')
      </div>
    </div>
    @include('plugins.js')
    @yield('js')
  </body>
</html>