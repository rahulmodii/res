<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('meta_description')">
    <meta name="author" content="{{ env('APP_NAME') }}">
    <title>@yield('title')</title>

    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700&display=swap" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap_customized.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/home.css') }}" rel="stylesheet">
    @yield('styles')
    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">

</head>

<body>

    @include('frontend.includes.header')
	<main>
        @yield('content')
    </main>
    @include('frontend.includes.footer')

	<div id="toTop"></div>

	<div class="layer"></div>

	@include('frontend.includes.signup')

    <script src="{{ asset('frontend/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('frontend/js/common_func.js') }}"></script>
    <script src="{{ asset('frontend/assets/validate.js') }}"></script>
    @yield('scripts')
</body>
</html>
