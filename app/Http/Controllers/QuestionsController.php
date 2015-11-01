<? namespace App\Http\Controllers;
//все вопросы
use App\Models\Question;
use App\Models\User;
use App\Models\Teg;
class QuestionsController extends Controller{
public function __construct(){
$this->middleware('auth',[
'except'=>[
'getIndex','show','getUsers','getUser','getUserQ1','getUserAns','getUserAns1','getTegs','getTeg','getStatus1','getStatus0','getAnswer1','getAnswer0'
]]);
parent::__construct();
}
public function getIndex(){
return view('questions.index',[
'questions' => Question::orderBy('id','desc')->paginate(),
'titlePage' => 'Новые вопросы'
]);
}
public function getTeg($id){
return view('questions.index',[
'questions'=>Teg::find($id)->questions()->paginate(),
'titlePage' => Teg::find($id)->name
]);
}
public function getUser($id){//показать вопросы одного пользователя
return view('questions.index',[
'questions'=> Question::where('user_id','=',$id)->paginate(),
'titlePage' => 'Вопросы пользователя '.User::find($id)->name
]);
}
public function getUserQ1($id){
return view('questions.index',[
'questions'=> Question::where('user_id','=',$id)->where('status','=','1')->paginate(),
'titlePage' => 'Решенные вопросы пользователя '.User::find($id)->name
]);
}
public function getUserAns($id){
//сделать вывод index или answers шаблона, закоментированное не помогло 
return view('questions.index',[
'questions' => Question::whereHas('answers', function($q) use($id){$q->where('user_id',$id);})->paginate(),
'titlePage' =>'Вопросы, на которые отвечал пользователь '.User::find($id)->name,
//'id'=>$id,
//'questions' => Question::paginate()
]);
        }
public function getUserAns1($id){
//поставить index или ans1 шаблон 
return view('questions.ans1',[
'id' => $id,
'titlePage'=>'Вопросы, на которые дал полезные ответы пользователь '.User::find($id)->name,
//'questions' => Question::where('status',1)function($q) use($id){$q->where('user_id',$id);})->paginate(),

'questions'=> Question::where('status','=','1')->paginate()
]);
}       
public function getStatus1(){
return view('questions.index',[
'questions'=>Question::where('status','=','1')->paginate(),
'titlePage' => 'Решенные вопросы'
]);
}
public function getStatus0(){
return view('questions.index',[
'questions'=>Question::where('status','=','0')->paginate(),
'titlePage' => 'Актуальные вопросы'
]);
}
public function getAnswer1(){
return view('questions.index',[
'questions' => Question::has('answers')->paginate(),
'titlePage' => 'Вопросы с ответами'
]);
}
public function getAnswer0(){//показать все вопросы без ответов
return view('questions.index',[
'questions' => Question::doesntHave('answers')->paginate(),
'titlePage' => 'Вопросы без ответов'
]);
}

}//end QuestionsController