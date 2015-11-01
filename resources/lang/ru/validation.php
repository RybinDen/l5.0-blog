<?php

return array(

	"accepted"         => "Вы должны принять :attribute.",
	"active_url"       => "Поле :attribute должно быть действительным URL-адресом.",
	"after"            => "Поле :attribute должно быть датой после :date.",
	"alpha"            => "Поле :attribute должно содержать только  буквы.",
	"alpha_dash"       => "Поле :attribute может  содержать  буквы, цифры, знаки подчеркивание(_) и дефис(-).",
	"alpha_num"        => "Поле :attribute может  содержать только   буквы и цифры.",
	"array"            => "Поле :attribute должно быть массивом.",
	"before"           => "Поле :attribute должно быть датой до :date.",
	"between"          => array(
		"numeric" => "Поле :attribute должно быть в диапазоне между :min и :max.",
		"file"    => "Размер файла  в поле :attribute должен быть размером между :min и :max килобайт(а).",
		"string"  => "Поле :attribute должно содержать от :min до :max символов.",
		"array"   => "Поле :attribute должно иметь от :min до :max элементов.",
	),
	"boolean"              => "Поле :attribute должно иметь значение логического типа.", 
    "confirmed"        => "Поле :attribute   не совпадает с подтверждением.",
	"date"             => "Поле :attribute должно быть датой.",
	"date_format"      => "Поле :attribute должно быть датой в формате :format.",
	"different"        => "Поле :attribute и :other должны различаться.",
	"digits"           => "Длина цифрового поле :attribute должна быть :digits",
	"digits_between"   => "Длина цифрового поле :attribute должна быть между :min и :max",
	"email"            => "Поле :attribute должно быть действительным адресом электронной почты",
	"exists"           => "Выбранное значение для :attribute уже существует.",
	"image"            => "Поле :attribute должно быть картинкой.",
	"in"               => "Выбранное значение для :attribute неверно.",
	"integer"          => "Поле :attribute должно быть целым числом.",
	"ip"               => "Поле :attribute должно быть полным IP-адресом.",
	"max"              => array(
		"numeric" => "Поле :attribute не должно превышать :max.",
		"file"    => "Поле :attribute должно быть не более :max килобайт(а).",
		"string"  => "Поле :attribute не должно превышать :max символов.",
		"array"   => "Поле :attribute  должно иметь не более :max элементов.",
	),
	"mimes"            => "Поле :attribute должно быть файлом типа: :values.",
	"min"              => array(
		"numeric" => "Поле :attribute должо быть не менее :min.",
		"file"    => "Поле :attribute должно быть не менее :min килобайт.",
		"string"  => "Поле :attribute должно быть не менее :min символов.",
		"array"   => "Поле :attribute должно иметь не менее :min элементов.",
	),
	"not_in"           => "Выбранное значение для  :attribute неверно.",
	"numeric"          => "Поле :attribute должно быть корректное числовое или дробное значение.",
	"regex"            => "Поле :attribute должно соответствовать регулярному выражению.",
	"required"         => "Поле :attribute не должно быть пустым.",
	"required_if"      => "Поле :attribute должно быть заполненно, если  поле :other имеет значение :value.",
	"required_with"    => "Поле :attribute должно быть заполненно, но только если  :values указанно.",
	"required_with_all"    => "Поле :attribute обязательно для заполнения, когда :values указано.",
    "required_without" => "Поле :attribute обязательно, но только если не указанно :values.",
	"required_without_all" => "Поле :attribute обязательно для заполнения, когда ни одно из :values не указано.",
    "same"             => "Значение :attribute и :other должны совпадать.",
	"size"             => array(
		"numeric" => "В поле :attribute должно быть число :size.",
		"file"    => "Поле :attribute должно быть :size килобайт.",
		"string"  => "Поле :attribute должно быть :size символов.",
		"array"   => "Поле :attribute должно содержать :size элементов.",
	),
	"unique"           => "Такое значение поля :attribute уже существует.",
	"url"              => "Поле :attribute имеет неверный формат.",
	/*собственные сообщения для заданного правила атрибута
пример
|   'custom' => array(
    |       'email' => array(
    |           'required' => 'Нам необходимо знать Ваш электронный адрес!',
    |       ),
    |   ),
*/

	'custom' => array(),
//переименование атрибутов полей

	'attributes' => [
'name'=>'наименование',
'login' => 'логин',
'email' => 'e-mail',
'password' => 'пароль',
'title' => 'заголовок',
'description' => 'описание',
'content' => 'содержимое',
],

);
