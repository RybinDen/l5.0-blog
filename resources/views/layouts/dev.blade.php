<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="">
<title>
@yield('title')
</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Latest compiled and minified CSS -->
<link media="all" type="text/css" rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
<!-- Optional theme -->
<link media="all" type="text/css"  rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
{{HTML::style('css/main.css')}}
</head>

<body>
<div class="container">
<h1><a href="/">Тифлофорум</a></h1>
@if(Session::has('message'))
<div class="has-error">{{Session::get('message')}}</div>
@endif
@if(Session::has('error'))
{{Session::get('error')}}
@endif
</div>

<div class="container-fluid">
@if(Session::has('errors'))
@foreach(Session::get('errors') as $errors)
{{$errors}}
@endforeach
@endif
@yield('content')
</div>
<footer class="footer">
<div class="container">
<p class="pull-left">
<ul>
<li>{{Request::is('static/about')? 'О сайте' : HTML::link('static/about', 'О сайте')}}</li>
<li>{{Request::is('static/rules')?'Правила':HTML::link('static/rules', 'Правила')}}</li>
<li>{{Request::is('guest')? 'Гостевой раздел' : HTML::link('guest', 'Гостевой раздел')}}</li>
<li>{{HTML::mailto('help@tifloforum.ru', 'Помощь')}}
</li>
</ul>
</p>
</div>
</footer>   
{{HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js')}}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body>
</html>