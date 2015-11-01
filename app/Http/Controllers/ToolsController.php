<?
use Yandex\Translate\Translator;
use Yandex\Translate\Exception;
class ToolsController extends BaseController{
public function getIndex(){
return View::make('tools.index');
}
public function getTranslate(){
return View::make('tools.translate');
}
public function postTranslate(){
if(Input::has('text')){
$key = 'trnsl.1.1.20140602T141504Z.c89e08d35fd83139.2bf4e4b64549f6bab0223db6d66c0eed408825db';
$text = Input::get('text');
try {
  $translator = new Translator($key);
  $translation = $translator->translate($text, 'ru');
return View::make('tools.translate')
->with('translation', $translation)
->with('source', $translation->getSource());
} catch (Exception $e) {
  echo 'error';
return View::make('tools.translate')
->with('error', $e->getMessage());
}
}
else{
return Redirect::back()->with('error', 'Необходимо написать текст для перевода');
}

}



}