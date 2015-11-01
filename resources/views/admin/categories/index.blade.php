@extends('admin.layout')
@section('content')
<h1>categories</h1>
@foreach($categories as $c)
{{$c->name}}<br>
{{$c->description}}<br>
{{HTML::link('admin/update-cat/'.$c->id, 'Изменить')}}<br>
{{HTML::link('admin/del-cat/'.$c->id, 'удалить')}}<br>
@endforeach
@stop