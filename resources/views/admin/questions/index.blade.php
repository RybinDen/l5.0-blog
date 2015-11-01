@extends('admin.layout')
@section('title')
 questions
@stop
@section('content')
<h1>questions</h1>
{{Form::open()}}

@foreach($questions as $q)
<input type="checkbox" name="question[]" value="{{$q->id}}">{{{$q->title}}}<br />
{{{$q->description}}}<br /> 
{{link_to('admin/question-update/'.$q->id,'Обновить')}}
<hr>
@endforeach
<input type="submit" name="delete" value="Удалить">
</form>
{{$questions->links()}}
@stop