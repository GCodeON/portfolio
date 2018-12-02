<!DOCTYPE html>
<html>
<head lang="en-US">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>@yield('page_title', config('styleguide.title'))</title>
    @foreach (config('styleguide.stylesheets') as $stylesheet)
        <link rel="stylesheet" href="{{ $stylesheet }}">
    @endforeach
    <link rel="stylesheet" href="{{ styleguide_assets('css/styleguide.css') }}">
    @stack('stylesheets')
    @yield('style')
    <style type="text/css">
        .style-sidebar {
            background-color : white;
            color            : black;
        }

        .style-sidebar .header a {
            color : black;
        }

        .style-item a {
            color : black;
        }
    </style>
</head>
<body class="{{$page['slug'] or 'generic'}} {{$bodyClass or ''}}">

<div id="myApp">
    @include('styleguide::partials.menu')

    <div class="grid-container">
        @yield('content')
    </div>
</div>

@foreach (config('styleguide.scripts') as $scripts)
    <script type="text/javascript" src="{{ $scripts }}"></script>
@endforeach
<script type="text/javascript" src="{{ styleguide_assets('js/styleguide.js') }}"></script>
@stack('scripts')
@yield('javascript')

</body>
</html>

