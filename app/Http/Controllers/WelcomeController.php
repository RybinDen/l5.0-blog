<?php namespace App\Http\Controllers;
use App\Models\Topic;
use App\Models\Question;

class WelcomeController extends Controller {
/*public function __construct(){
parent::__construct();
}*/
public function index(){
return view('welcome',[
'topics' => Topic::orderBy('id', 'desc')->limit(9)->get(),
'questions' => Question::orderBy('id','desc')->limit(9)->get()
]);
}

}
