<!DOCTYPE html>
<html>
<head lang="en-US">
    @include('partials.metas')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
	<!-- <link rel="stylesheet" type="text/css" href="css/flickity.css" /> -->
	<link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="js/modernizr.custom.js"></script>

    @stack('stylesheets')
    @yield('css')
    
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}} {{$brand or ''}}">

@include('partials.facebook', ['facebookId' => env('FACEBOOK_APP_ID')])

<div id="myApp">
    <logo-loader></logo-loader>
    @yield('main')
</div>

<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

    <!-- <script src="js/flickity.pkgd.min.js"></script> -->
	<!-- <script src="js/smoothscroll.js"></script> -->
	<!-- <script src="js/main.js"></script> -->
@stack('scripts')
@yield('javascript')

</body>
</html>
