<?php namespace App\Models;
use Kodeine\Acl\Traits\HasRole;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword, HasRole;

	protected $table = 'users';

	protected $fillable = ['name', 'email', 'password'];

	protected $hidden = ['password', 'remember_token'];
public function fotos(){
return $this->hasMany('App\Models\Foto');
}
public function questions(){
//return $this->hasManyThrough('Answer','Question');
return $this->hasMany('App\Models\Question');
}
public function answers(){
return $this->hasMany('App\Models\Answer');
}
public function topics(){
return $this->hasMany('App\Models\Topic');
}
public function comments(){
return $this->hasMany('App\Models\Comment');
}

}