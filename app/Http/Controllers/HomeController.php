<?php namespace App\Http\Controllers;
use Auth;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/
//protected $user;
public function __construct()
	{
$this->middleware('auth');
//$this->user = Auth::user();
parent::__construct();

	}

	public function index()
	{
		return view('home',['user'=>$this->user]);
	}

}
