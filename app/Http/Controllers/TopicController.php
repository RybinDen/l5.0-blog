<? namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\Teg;
use Illuminate\Http\Request;
class TopicController extends Controller{
public function __construct(){
$this->middleware('auth', ['except' => [
'show']]);
 parent::__construct();
}
public function show($id){
try{
$topic = Topic::findOrFail($id);
//счетчик просмотров
if(empty($this->user) or $this->user->id != $topic->user_id){
\DB::table('yiitopics')->increment('views');
}
return view('topics.show',[
'topic' => $topic
]);
}catch(ModelNotFoundException $e){
return view('errors.404');
}
}
public function getDelete($id=null){
if(empty($id)){
return redirect('topics');
}else{
$topic = Topic::find($id);
if($topic->user_id == $this->user->id){
$topic->delete();
return redirect('topics')->with('message','Статья удалена');
}else{
return redirect()->back()
->with('message', 'Произошла ошибка при обработке запроса');
}
}
}
public function getCreate(){
return view('topics.create1',[
'tegs' => Teg::all()
]);
}
public function postCreate(Request $request){
if($request->has('new_teg')){
$teg = new Teg;
$teg->name = $request->input('new_teg');
$teg->save();
return view('topics.form',[
'message' => 'Метка создана',
'teg' => $teg
]);
}
else{
return view('topics.form',[
'teg' => Teg::find($request->input('teg'))
]);
}
}

public function postSave(Request $request){
if($request->has('update')){
$topic = Topic::find($request->input('update'));
$topic->teg_id = '1';//$request->input('teg');
$topic->title = $request->input('title');
$topic->description = $request->input('description');
$topic->content = $request->input('content');
//$topic->user_id = $this->user->id;
$topic->save();
}else{
Topic::create([
'teg_id' => $request->input('teg'),
'title' => $request->input('title'),
'description' => $request->input('description'),
'content' => $request->input('content'),
'user_id' => $this->user->id
]);
}
return redirect('topics')->with('message', 'Статья  сохранена.');
}

public function getEdit($id){
        $topic = Topic::find($id);
return view('topics.form',[
'topic' => $topic,
'update' => 'Обновить',
'teg' => $topic->with('teg')->get()
]);
}

}//end TopicController