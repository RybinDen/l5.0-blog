<!DOCTYPE html>
<html lang="ru">
@include('layouts.blocks.head')
<body>
@include('layouts.blocks.flash')
@include('layouts.blocks.nav')
<div class="container-fluid" id="main" role="main">
@yield('content')
</div>

<footer class="footer">
<div class="container">
<p class="pull-left">
<ul>
<li>{!!Request::is('site')? 'О сайте' : '<a href="/site">О сайте</a>'!!}</li>
<li>{!!Request::is('site/rules')?'Правила': '<a href="/site/rules">Правила</a>'!!}</li>
<li>{!!Request::is('site/message')? 'Обратная связь' : '<a href="/site/message">Обратная связь</a>'!!}</li>
</ul>
</p>
<p class="pull-right">
Посетителей за последний час: 
{{$online or 'не было'}}.<br>
{!! date('H:i') !!}
<a class="sr-only sr-only-focusable" href="#nav">Наверх</a>
{!! round((microtime(1) - LARAVEL_START), 3) !!} с.
</p>
</div>
</footer>   
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
</body></html>