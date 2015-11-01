@extends('admin.layout')

@section('title')
throttle
@stop
@section('content')
{{HTML::link('admin/throttle-disable', 'Отключить throttle provider')}}

@stop
