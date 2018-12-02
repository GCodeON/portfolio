@extends('layouts.base')

@section('main')
    <div id="menu">
        @include('partials.menu')
    </div>
    <div class="content">
        @yield('content')
    </div>

    @include('partials.footer')

@stop

