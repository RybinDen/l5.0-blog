<? namespace App\Http\Controllers;
//отображение одного вопроса
use App\Models\Answer;
use App\Models\Question;
use App\Models\Teg;
use App\Models\Subscribe;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class QuestionController extends Controller {

public function __construct(){
$this->middleware('auth',[
'except' => 'show'
]);
parent::__construct();
}
public function show($id){
try{
$s = '';
$question = Question::findOrFail($id);
if(empty($this->user) or $question->user_id != $this->user->id){
\DB::table('yiiquestions')->increment('views');//счетчик просмотров
}else{
$s = Subscribe::where('question_id', '=', $question->id)->where('user_id', '=', $this->user->id)->get();
}
return view('questions.show',[
'question' => $question,
's' => $s,
'answers' => Answer::where('question_id','=',$question->id)->with('user')->get()
]);
}catch(ModelNotFoundException $e){
return view('errors.404');
}
}

public function getCreate(){
return view('questions.form',[
'tegs' => Teg::all()
]);
}
public function postSave(Request $request){//создание и обновление,
if($request->has('update')){//обновляем
$question = Question::find($request->input('update'));
$question->title = $request->input('title');
$question->description = $request->input('description');
// сделать добавление меток
if($request->has('teg')){
//сохраняем новые связи
$question->tegs()->sync($request->input('teg'));
}
$question->save();
return redirect('questions')->with('message','Вопрос обновлен');
}else{//сохраняем новый вопрос
//if validation
//сохранить не удалось, ошибки при валидации return redirect()->back()->withInput()->withErrors($validator);
//}else{//сохраняем, валидация прошла
$question = Question::create([
'user_id' => $this->user->id,
'title' => $request->input('title'),
'description' => $request->input('description')
]);
//сохраняем, но проверить чтобы были метки
 
$question->tegs()->attach($request->input('teg'));

Subscribe::create([
'question_id' => $question->id,
'user_id'=>$this->user->id
]);
return redirect('questions')
->with('message','¬аш вопрос сохранен, когда будет ответ вам на почту придет уведомление.');
//}
}
}//end postSave

public function getUpdate($id){
$question = Question::find($id);
if(!$question){
App::abort(404);
}
if($question->user_id == $this->user->id){
return view('questions.form',[
'question' => $question,
'update' => 'обновить',
'tegs' => Teg::all()
]);
}else{
return redirect('question/'.$id);
}


}
public function getDelete($id){
$question = Question::find($id);
if(!$question){
App::abort(404);
}
if($question->user_id == $this->user->id){
$question->tegs()->detach();//удал¤ем св¤зи
$question->delete();
return redirect('questions')->with('message','¬опрос удален');
}else{
return redirect('question/'.$id);
}


}
public function getSubscribe($id){
$subscribe = new Subscribe([//помен¤ть на функцию create
'question_id'=>$id,
'user_id'=>$this->user->id
]);
$subscribe->save();
return redirect()->back()->with('message','Вы успешно подписаны, когда будет ответ на данный вопрос, вам на почту придет уведомление.');
}

}//end QuestionController