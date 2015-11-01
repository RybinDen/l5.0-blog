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
//������ ��������� return redirect()->back()->withErrors($validator);
$teg = new Teg();
$teg->name = $request->input('name');
$teg->save();
return redirect('question/create')
->with('message','����� �������,, ������ ������ �� ������� �� ������');
}//end postSave
public function getDelete($id = null){
//������ ��� ������
return view('questions.del-teg',['tegs' => Teg::all()]);
//��� �������
Teg::destroy($id);
return redirect('questions/user/'.$this->user->id)->with('message','����� �������');
}
public function postDelTeg(){
//������ ��� ������ �������� ���������� �����
Teg::destroy(Input::get('teg'));
return redirect()->back()->with('message','����� �������');
}


}//end TegController