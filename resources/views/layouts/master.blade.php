<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>@yield('title')</title>
    @stack('styles')
</head>
@if (isset($profile_variable))
    <body class="search-bg">
    @elseif(isset($profile_vew))
        <body class="profile-bg">
    @else
        <body>
@endif

@if (isset($home))
    @include('layouts.header')
@else
    @include('layouts.1header')
@endif

@yield('content')
@include('layouts.footer')
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
@stack('scripts')
</body>

</html>
