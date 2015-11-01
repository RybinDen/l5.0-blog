@extends ('layouts.app')
@section('title')
Контакты
@endsection
@section('menu')
<li>{!!Request::is('about')? 'О сайте' : '<a href="/about">О сайте</a>'!!}</li>
<li>{!!Request::is('contacts')? 'Контакты' : '<a href="/contacts">Контакты</a>'!!}</li>
@stop
@section('content')
<h1>Форма  связи с администрацией Тифлофорума</h1>
<p>Здесь можете задать свои вопросы или  предложения и пожелания, также сообщить об ошибке на сайте.<br>
<strong>Ваше сообщение будет отправлено на электронную почту администрации сайта.</strong></p>
Проверочный код: <b>{{$captcha}}</b>

@if($errors->has())
<div class="worning">Ошибка, сообщение отклонено.</div>
@foreach ($errors->all() as $error)
<div class="alert alert-error">{{$error}}</div>
@endforeach
@endif


@if(Session::has('errorCaptcha'))
<div>
{{Session::get('errorCaptcha')}}
</div>
@endif
<form method="post" action="{{action('ContactsController@postIndex')}}" class="form-horizontal" role="form" title="Написать сообщение">
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<div class="form-group">
<div class="form-group">
<label>проверочный код
<input type="text" name="captcha" title="Проверочный код" required><br />
</label>
</div>
<label for="name" class="control-label col-sm-4">Ваше имя: </label>
<div class="col-sm-8">
<input type="text" name="name"class="form-control" value="{{old('name')}}" title="Ваше имя" required>
</div></div>
<div class="form-group">
<label for="from" class="control-label col-sm-4">Ваш email: </label>
<div class="col-sm-8">
<input type="email" name="from" class="form-control" value="{{old('from')}}" title="ваш email" required>
</div></div>
<div class="form-group">
<label for="subject" class="control-label col-sm-4">Тема: </label>
<div class="col-sm-8">
<input type="text" name="subject" class="form-control" value="{{old('subject')}}" title="Тема" required>
</div></div>

<div class="form-group">
<label for="text" class="control-label col-sm-4">Текст сообщения: </label>
<div class="col-sm-8">
<input type="text" name="text" class="form-control" value="{{old('text')}}" title="Сообщение" required>
</div></div>
<div class="form-group">
<div class="col-sm-12">
<button class="btn btn-primary" type="submit">Сохранить</button>
</div></div>
</form>
@endsection