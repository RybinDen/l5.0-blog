<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
<h1>Активация профиля</h1>
		
Здравствуйте, {{$name}}! 
Вы запросили на сайте {{HTML::link('/')}} код активации профиля, перейдите по 
{{HTML::link('activation/'.$id.'/'.$code, 'этой ссылке')}}
Если ссылка не открывается то можете вручную активировать свой профиль, ваш код активации: 
{{$code}}

{{HTML::link('activation', 'активация профиля')}}
Ваш пароль {{$password}}
 сохраните пароль в надежном месте. 
</body></html>