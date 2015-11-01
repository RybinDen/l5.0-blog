<? namespace App\Http\Controllers;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use App\Models\Foto;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
class UserController extends Controller {
public function __construct(){
$this->middleware('auth');
parent::__construct();
}
public function getIndex(){
return view('user.index',[
'users' => User::orderBy('id','desc')->paginate()
]);
}
public function show($id){
try{
$user = User::findOrFail($id);
return view('home',['user' => $user]);
}catch(ModelNotFoundException $e){
return view('errors.404');
}
}

public function getUpdate(){
return view('user.update',['user'=>$this->user]);
}
public function postUpdate(UserUpdateRequest $request){
$user = User::find($this->user->id);
$user->name = $request->input('name');
$user->first_name = $request->input('first_name');
$user->last_name = $request->input('last_name');
$user->email = $request->input('email');
$user->city = $request->input('city');
$user->info = $request->input('info');
$user->save();
return redirect('home')->with('message', 'Данные обновлены успешно');
}
public function getPassword(){
return view('user/password');
}
public function postPassword(Request $request){
$hashedPassword = $this->user->password;
if(\Hash::check($request->input('password'), $hashedPassword)){
if($request->input('password1') === $request->input('password1_comform')){
//сохраняем новый пароль
$this->user->password = \Hash::make($request->input('password1'));
$this->user->save();
return redirect('home')->with('message','Вы успешно поменяли свой пароль');
}else{
return redirect()->back()->withInput()->with('message', 'Новый пароль не совпадает с его повторным вводом');
}
}else{//введенный пароль не совпадает с хэшем
return redirect()->back()->withInput()->with('message', 'неправильно введен старый пароль');
}
}

public function getUpload(){
return view('user.upload');
}
public function postUpload(Request $request){
//dd($request->file('image'));
if($request->hasFile('image')){//проверяем загружался ли файл
$file = $request->file('image');
    if ($request->file('image')->isValid()) {
      $destinationPath = 'uploads'; // upload path
$fileName   = str_random(24) . '.' . $file->getClientOriginalExtension();
$foto = new Foto(['name' => $fileName]);
$foto->user()->associate($this->user)->save();
/*Image::make($this->request->file('image')
->getRealPath())
->resize(300, 200)
->save($destinationPath.'/'.$fileName);
*/
$request->file('image')->move($destinationPath, $fileName);//сохранение файла  
      return redirect('home')->with('message','Фото загружено');
    }else{
      // sending back with error message.
      Session::flash('error', 'uploaded file is not valid');
return redirect()->back();
    }
}else{//файл не загружен
return redirect()->back()->with('message','Необходимо выбрать фото для загрузки');
}
}//end postupload

public function getDelFoto($id){
Foto::destroy($id);
return redirect('home')->with('message','Фото удалено');

}
}//end UserController