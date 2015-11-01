@extends('layouts.app')
@section('title')
{!!$update or 'Задать'!!} вопрос
@stop
@section('content')
<h1>{!!$update or 'Задать'!!} вопрос</h1>
<form action="/question/save" method="POST" class="form-horizontal">
<input type="hidden" name="_token" value="{{csrf_token()}}">
@if(isset($question))
<input type="hidden" name="update" value="{{$question->id}}">
<h2>Выбраны метки</h2> 
<b>
@foreach($question->tegs as $questionTeg)
{{$questionTeg->name}}   
@endforeach
<p>Они сохранятся, если не укажете других.</p>
</b>     
<p>можете нажать цифру 2 чтобы пропустить список меток, если вы не хотите их менять.</p>
@foreach($tegs as $teg)
    <input type="checkbox" name="teg[]" value="{{ $teg->id }}" {{ in_array($teg->id, $question->tegs->modelKeys()) ? 'checked' : '' }}>
    {{ $teg->name }} <br />
@endforeach

@else
<p><i>Выберите  одну или несколько меток которые будут указывать к чему относится вопрос</i></p> 
@foreach($tegs as $teg)
<input type="checkbox" name="teg[]" value="{{ $teg->id }}">{{$teg->name}}<br />
@endforeach
@endif



<p>Если нет подходящей, то можно 
<a href="/teg/create">создать новую метку</a></p>

<h2>Форма Вопроса</h2>
<div class="form-group">
<label for="title" class="control-label col-md-4">Заголовок вопроса</label>
<div class="col-md-8">
<input type="text" name="title" value="{{$question->title or old('title')}}" class="form-control" required>
</div></div>
<div class="form-group">
<label for="description" class="control-label col-md-4">Подробно опишите свой вопрос</label>
<div class="col-md-8">
<textarea name= "description" class="form-control" placeholder="подробное описание вопроса" required>
{{$question->description or old('description')}}
 </textarea>
</div></div>
<input type="submit" value="{{$update or 'Сохранить'}}">
</form>
@stop