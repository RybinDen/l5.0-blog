@extends('admin.layout')
@section('content')
<h1>update category</h1>
{{Form::open()}}
{{Form::text('name', $category->name)}}
{{Form::text('description', $category->description)}}
{{Form::submit('Сохранить')}}
{{Form::close()}}
@stop