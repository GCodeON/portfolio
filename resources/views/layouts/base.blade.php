<!DOCTYPE html>
<html>
<head lang="en-US">
    @include('partials.metas')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
          integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="icon" type="image/png" href="{{ asset('images/dna-ring.png') }}"/>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @stack('stylesheets')
    @yield('css')
    <noscript>
        <style type="text/css">
            [data-aos] {
                opacity: 1 !important;
                transform: translate(0) scale(1) !important;
            }
        </style>
    </noscript>
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}} {{$brand or ''}}">

@include('partials.facebook', ['facebookId' => env('FACEBOOK_APP_ID')])
<div id="canvas-wrapper">
    <canvas id="gradient"></canvas>
    <div class="content-wrapper">
        <div id="myApp">
            <logo-loader></logo-loader>
            @yield('main')
        </div>
    </div>
</div>




<script type="text/javascript" src="{{ mix('js/manifest.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/vendor.js') }}"></script>
<script type="text/javascript" src="{{ mix('js/app.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/granim/2.0.0/granim.min.js" integrity="sha512-CmlPTWm5+a1Gt2YSNk2rGZVvbH3Zge6imS7M4/vrhC8d+A1RcehmLxWMqUdv8aEu7pwfTo74EtnrR+8Cf8KdCA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.1/TweenMax.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

@stack('scripts')
@yield('javascript')

</body>
</html>
