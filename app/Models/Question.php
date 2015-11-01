<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Question extends Model{
protected $table = 'yiiquestions';
protected $fillable = [
'user_id','title','description'
];

public function tegs(){
return $this->belongsToMany('App\Models\Teg','yiiquestion_teg');
}
public function user(){
return $this->belongsTo('App\Models\User');
}
public function answers(){
return $this->hasMany('App\Models\Answer');
}
public function subscribers(){
return $this->hasMany('App\Models\Subscribe');
}

}