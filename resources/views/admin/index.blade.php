@extends('admin.layout')
@section('content')

@foreach($users as $u)
{{$u->name}}<br>
{{$u->email}}<br>
@endforeach
{!!$users->render() !!}
@stop