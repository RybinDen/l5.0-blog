<nav class="navbar navbar-default" id="nav">
<div class="container-fluid">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Тифлофорум</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
<ul class="nav navbar-nav" id="nav">
<li>{!!Request::is('/')?'Главная':'<a href="/">Главная</a>'!!}</li>
<li>{!!Request::is('teg')?'Метки':'<a href="/teg">Метки</a>'!!}</a></li>
<li>{!!Request::is('topics')?'Статьи':'<a href="/topics">Статьи</a>'!!}</li>
<li>{!!Request::is('questions')?'Вопросы':'<a href="/questions">Вопросы</a>'!!}</li>
@yield('menu')
</ul>

<ul class="nav navbar-nav navbar-right">
@if (Auth::guest())
<li>{!!Request::is('auth/login')?'Вход':'<a href="/auth/login">Вход</a>'!!}</li>
<li>{!!Request::is('auth/register')?'Регистрация':'<a href="/auth/register">Регистрация</a>'!!}</li>
@else
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>

<ul class="dropdown-menu" role="menu">
<li>{!!Request::is('question/create')?'Задать вопрос':'<a href="/question/create">Задать вопрос</a>'!!}</li>
<li>{!!Request::is('topic/create')?'Написать статью':'<a href="/topic/create">Написать статью</a>'!!}</li>
<li>{!!Request::is('home')?'Профиль':'<a href="/home">Профиль</a>'!!}</li>
<li>{!!Request::is('users')?'Пользователи':'<a href="/users">Пользователи</a>'!!}</li>
<li><a href="/auth/logout">Выход</a></li>
</ul>
</li>
@endif
</ul>
</div>
</div>
</nav>