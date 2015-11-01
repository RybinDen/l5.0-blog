<? namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller {
public function __construct(){
$this->middleware('auth', ['except' => [
'getIndex', 'show'
]]);
parent::__construct();
}

public function getIndex()
{
        return view('category.index',[
'categories' => Category::paginate()
]);
}

public function getCreate()
{
return view('category.form');
}

public function postSave()
{
$category = new Category;
$category->user_id = $this->user->id;
$category->name = Input::get('name');
$category->description = Input::get('description');
$category->save();
return redirect('category')
->with('message', 'категория добавлена');
}

public function postDelete(){
$category = Category::find(Input::get('category'))->delete();
return redirect()->back()->with('message', 'категория удалена');
}
//сделал отображение статей в одной категории в вфайле topicsController@getCategory($id)

	public function getUpdate($id)
	{
        return view('category.form',[
'category' => Category::find($id),
'update' => 'обновить'
]);
	}

	}