<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth;
abstract class Controller extends BaseController {
	use DispatchesCommands, ValidatesRequests;

protected $user;
public function __construct(){
//$online = Online::all()->count();
//$online = Online::registered()->count();
//$online = Online::guests()->count();
//правильно разместить этот код в appServiceProviders
//view()->share('online', $online);
if(Auth::check()){
$this->user = Auth::user();
view()->share('corentUser', $this->user);

}

}}
