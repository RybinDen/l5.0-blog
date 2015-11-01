<? namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Topic;
use App\Models\Teg;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
class TopicsController extends Controller {

public function getIndex()
{
        return view('topics.index',[
'topics' => Topic::orderBy('id', 'desc')->paginate(),
'titlePage' => 'Новые статьи',
]);
}
public function getUser($id){
$topics = Topic::where('user_id', $id);
if(!$topics){
return view('errors.404');
}else{
return view('topics.index',[
'topics' => $topics->orderBy('id','desc')->paginate(),
'titlePage' => 'Статьи пользователя '.User::find($id)->name
]);
}
}
public function getTeg($id){
try{
$teg = Teg::findOrFail($id);
return view('topics.index',[
'topics' => Topic::where('teg_id', $teg->id)->orderBy('id','desc')->paginate(),
'titlePage' => 'Статьи с меткой '.$teg->name,
]);
}catch(ModelNotFoundException $e){
return view('errors.404');
}
}

}//end topicsController