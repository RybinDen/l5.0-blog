<? namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
class ContactsController extends Controller{
public function getIndex(){
$captcha = str_random(5);
Session::flash('captcha',$captcha);
return view('contacts',[
'captcha' => $captcha
]);
}
public function postIndex(Request $request){
if(Session::get('captcha') === $request->input('captcha')){
$rules =[
'name' => 'required',
'from' => 'required|email',
'subject' => 'required',
'text' => 'required'
];
$this->validate($request, $rules);
//if($validator->fails()){
//return redirect()->back()->withInput()->withErrors($validator);
//}else{
//отправляем письмо 
$data = [
'from' => $request->input('from'), //от кого
'name' => $request->input('name'),
'subject' => $request->input('subject'),
'text'=> $request->input('text'),
];
\Mail::send('emails.guest', $data, function($m) use($data){
$m->from($data['from']);
$m->to('mejdugorka@yandex.ru')->subject($data['subject']);
});
return redirect('/')
->with('message','Ваше письмо отправлено, в ближайшее время мы ответим вам.');
//}
}else{//каптча невалидна
return redirect()->back()->withInput()
->with('errorCaptcha','Ошибка! Проверочный код введен не верно.');
}

}

}