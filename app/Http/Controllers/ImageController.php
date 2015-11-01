<?php

class ImageController extends BaseController {

	public function getImage(){
$img = Image::make('www/assets/images/lev.jpg');

// изменить размер  
$img->resize(320, 240);

//вставить водяной знак
//$img->insert('public/watermark.png');

//сохранение нового изображения
$img->save('123.jpg');}
public function 123getImage($filename) {
// добавить имя файла в каталог, где находятся наши образы
		$path = Config::get('assets.images') . $filename;
echo $path;

// Инициализация объекта класса File  от Symfony's.
		// Это зависимость Laravel так он легко доступен.
		$file = new Symfony\Component\HttpFoundation\File\File($path);

// Создать объект response из содержимого файла 
// Установить код состояния ответа на 200 OK
		$response = Response::make(
			File::get($path), 200);

// изменить заголоки нашего продукта
// Установить тип содержимого content type в mime для файла. 
// В случае .jpeg это будет image/jpeg 
		$response->header(
			'Content-type',
			$file->getMimeType()
		);

		// здесь вернем наше изображение
		return $response;
}

}
