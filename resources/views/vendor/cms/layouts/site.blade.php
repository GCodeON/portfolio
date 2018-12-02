@extends('admin.layouts.site')

@section('content')
    <div id="cms-wrap">
        @yield('cms-content')
    </div>
@stop

@push('stylesheets')
    <link rel="stylesheet" href="{{ mix('css/app-cms.css') }}">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ mix('js/app-cms.js') }}"></script>
@endpush

