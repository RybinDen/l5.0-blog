<?php namespace App\Models;

//use Illuminate\Database\Eloquent\Model;

class Foto extends Model {
protected $table = 'fotos';
protected $fillable = ['name'];

public function user(){
return $this->belongsTo('App\Models\User');
}

}
