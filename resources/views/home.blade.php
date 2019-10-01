@extends('layouts.site', ['bodyClass' => 'home'])

@section ('content')
<github-user :username="GCodeOn"></github-user>
@stop