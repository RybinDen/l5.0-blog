<? namespace App\Http\Controllers\Admin;
use Kodeine\Acl\Models\Eloquent\Role;
use Kodeine\Acl\Models\Eloquent\Permission;
use App\Models\User;
class AdminController extends \App\Http\Controllers\Controller{
public function getIndex(){
$users = User::paginate(10);

return View('admin.index',[
'users'=> $users
]);
}
public function getQuestions(){
return View::make('admin.questions.index',[
'questions' => Question::paginate(10)
]);

}
public function answer(){

}
public function getCreateRoles(){
$role = new Role();
$roleAdmin = $role->create([
    'name' => 'Administrator',
    'slug' => 'administrator',
    'description'=>'manage administration privileges'
]);

$role = new Role();
$roleModerator = $role->create([
    'name' => 'Moderator',
    'slug' => 'moderator',
    'description'=>'manage moderator privileges'
]);
$role = new Role();
$roleAuthor = $role->create([
    'name' => 'Author',
    'slug' => 'author',
    'description'=>'Управление созданными данными'
]);
return 'Роли созданы';
}
public function getRoleToUser(){
$user = User::find(7);
$user->assignRole('administrator, moderator');
return 'access';
}
public function getUserDelete($id){
User::destroy($id);
return Redirect::to('admin')->with('message', 'Пользователь удален');
}
public function getComment(){
$comments = Comment::all();
return View::make('admin.comments.index')->with('comments', $comments);
}

public function getCommentDel($id){
Comment::destroy();
return Redirect::back()->with('message', 'Комментарий удален');
}
public function getCategories(){
return View::make('admin.categories.index')
->with('categories', Category::all());
}
public function getDelCat($id){
Category::find($id)->delete();
return Redirect::back();
}
public function getUpdateCat($id){
return View::make('admin.categories.update')
->with('category', Category::find($id));
}
public function postUpdateCat($id){
$category = Category::find($id);
$category->name = Input::get('name');
$category->description = Input::get('description');
$category->save();
return Redirect::to('admin/categories');
}

}