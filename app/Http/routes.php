<?php
//google
Route::get('testgo', function(){
return Socialize::with('google')->redirect();
});
Route::get('authgoogle', 'SocialController@google');
//github
Route::get('testgh', function(){
return Socialize::with('github')->redirect();
});
Route::get('authgh', 'SocialController@github');
//facebook
Route::get('testfc', function(){
return Socialize::with('facebook')->redirect();
});
Route::get('authfc', 'SocialController@facebook');
//Online::updateCurrent();
Route::get('/', 'WelcomeController@index');
Route::get('about', function(){
return view('about');});
Route::get('home', 'HomeController@index');

Route::get('topic/{id}', 'TopicController@show');
Route::get('teg/{id}', 'TegController@show');
Route::get('question/{id}', 'QuestionController@show');
Route::get('user/{id}','UserController@show');
Route::get('users','UserController@getIndex');


Route::controllers([
'contacts' => 'ContactsController',
'auth' => 'Auth\AuthController',
'password' => 'Auth\PasswordController',
'answer' => 'AnswerController',
'comment' => 'CommentController',
'question' => 'QuestionController',
'questions' => 'QuestionsController',
'teg' => 'TegController',
'topic' => 'TopicController',
'topics' => 'TopicsController',
'user' => 'UserController',
//'tools' => 'ToolsController',
]);

Route::group([
'middleware' => ['auth', 'acl'],
'is' => 'administrator',
'prefix' => 'admin',
'namespace' => 'Admin'], function()
{
    Route::controller('admin','AdminController');

});
