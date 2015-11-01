<? namespace App\Http\Controllers;
class SocialController extends Controller{
//google
public function google(){
$user = \Socialize::with('google')->user();
return $user->getName(). ' '.$user->getEmail().'<br />'.$user->getNickname().'<br /><img src="'.$user->getAvatar().'" alt="foto">';
//return $user->token;
}
//facebook
public function facebook(){
$user = \Socialize::with('facebook')->user();
return $user->getName(). ' '.$user->getEmail().'<br />'.$user->getNickname().'<br /><img src="'.$user->getAvatar().'" alt="foto">';
//return $user->token;
}
//github
public function github(){
$user = \Socialize::with('github')->user();
return $user->getName(). ' '.$user->getEmail().'<br />'.$user->getNickname().'<br /><img src="'.$user->getAvatar().'" alt="foto">';
//return $user->token;
}
}//end socialController