<? namespace App\Http\Controllers;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Subscribe;
use Illuminate\Http\Request;
class AnswerController extends Controller{

public function __construct(){
$this->middleware('auth');
parent::__construct();
}
public function getIndex(){
//сделать когда зарегистрированный пользователь открывалось чтоб его 

}
public function getEdit($id){
$answer = Answer::find($id);
return redirect('question/'.$answer->question->id)
->with('question', Question::find($answer->question->id))
->with('answerUpdate', $answer);
}
public function postSave(Request $request){
$question = Question::find($request->input('question'));
if(!$request->has('update')){
$answer = new Answer([
'user_id' => $this->user->id,
'question_id' => $question->id,
'description' => $request->input('description'),
]);
$answer->save();
//отправляем подписчикам вопроса письмо о наличие ответа
$data = [
'avtor' => $answer->user->name,
'question' => $question->title,
'page' => 'question/'.$question->id,
];
$subscribers = Subscribe::where('question_id', $question->id)->get();
foreach($subscribers as $subscriber){
$subscriber = $subscriber->user->email;
\Mail::send('emails.subscribe', $data, function($m)  use($subscriber){
$m->to($subscriber)->subject('Поступил ответ на интересующий вас вопрос');
});
}

}else{//обновляем ответ
$answer = Answer::find($request->input('update'));
$answer->description = $request->input('description');
$answer->save();
}

return redirect()->back()
->with('message', 'Ответ сохранен.');

}
public function getDelete($id){
$answer = Answer::find($id);
if(!$answer){
App::abort(404);
}
if($answer->user_id == $this->user->id){
$answer::destroy($id);
return redirect()->back()->with('message','Ответ удален');
}else{
return redirect('questions');
}
}
public function getStatus($id){
$answer = Answer::find($id);
if(!$answer){
App::abort(404);
}
if($answer->question->user_id == $this->user->id){
$answer->status = 1;
//установить статус 1 у соответствующего вопроса
if($answer->question->status != 1){
$answer->question->status = 1;
$answer->push();//сохраняем связь
}else{//статус решен, просто сохраняем
$answer->save();
}
return redirect('questions')->with('message','Ответ помечен как решение');
}else{
return redirect('questions');
}
}


}