<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="author" content="">
<link rel="shortcut icon" href="bootstrap/eco/favicon.png">

    
<title> Панель управления - 
@yield('title')
</title>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/main.css" rel="stylesheet">
</head>
    <body>
<a href="{{url('/')}}">Общая часть</a>

<a href="{!!url('/auth/logout')!!}">Выход</a>

<h1><label class="menu" for="menu-forum">Меню форума</label></h1>
<input type="checkbox" id="menu-forum" />
<ul id="submenu-forum">
<li>{{url('forum/create', 'Создать форума')}}</li>
<li>{{url('category/create', 'Создать категорию')}}</li>
<li>{{url('theme/create', 'Создать тему')}}</li>
<li>{{url('post/create', 'Написать сообщение')}}</li>
</ul>
<h1><label class="menu" for="menu-user">Управление пользователями</label></h1>
<input type="checkbox" id="menu-user" />
<ul id="submenu-user">
<li>{{url('admin/create-group', 'Создать группу')}}</li>

</ul>
@if (Session::has('message'))
{{ Session::get('message') }}
@endif
<div class="container">
@yield('content')
</div>
</body></html>