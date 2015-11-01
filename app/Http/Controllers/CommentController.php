<? namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller {

public function __construct(){
$this->middleware('auth', ['except' => [
'getIndex',
'getShow'
]]);
parent::__construct();
}

	public function index()
	{
        return view('comments.index');
	}

	public function create()
	{
        return view('comments.create');
	}

	public function postSave(Request $request){
    
Comment::create([
'content' => $request->input('comment'),
'user_id' => $this->user->id,
'topic_id' => $request->input('topic'),
]);
return redirect()->back()->with('message', 'Комментарий добавлен');

	}

	public function getDelete($id){
Comment::destroy($id);
return redirect()->back()
->with('message', 'Комментарий удален');
}

}