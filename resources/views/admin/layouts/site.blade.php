@extends('layouts.base', ['bodyClass' => 'admin'])

@section('main')
    <div id="admin-container">
        <div class="fixed-header">
            @include('admin.partials.menu')
        </div>
        <div class="content">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell small-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

