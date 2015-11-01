<? namespace App\Http\Controllers;
use App\Models\Teg;
use Illuminate\Http\Request;

class TegController extends Controller{
public function __construct(){
$this->middleware('auth',[
'except' => [
'getIndex','show'
]]);
parent::__construct();
}
public function getIndex(){
return view('teg.index',[
'tegs' => Teg::paginate()
]);
}//end getIndex
public function show($id){
$teg= Teg::find($id);
return view('teg.show',[
'teg' => $teg,
]);
}
public function getCreate(){
return view('teg.form');
}
public function postSave(Request $request){
//ошибка валидации return redirect()->back()->withErrors($validator);
$teg = new Teg();
$teg->name = $request->input('name');
$teg->save();
return redirect('question/create')
->with('message','Њетка создана,, теперь можете ее выбрать из списка');
}//end postSave
public function getDelete($id = null){
//только для админа
return view('questions.del-teg',['tegs' => Teg::all()]);
//для авторов
Teg::destroy($id);
return redirect('questions/user/'.$this->user->id)->with('message','Метка удалена');
}
public function postDelTeg(){
//только для админа удаление нескольких меток
Teg::destroy(Input::get('teg'));
return redirect()->back()->with('message','метка удалена');
}


}//end TegController