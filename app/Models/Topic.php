<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model{

protected $table = 'yiitopics';
//protected $softDelete = true;
protected $fillable = ['user_id','category_id','title','description','content'];
public function user(){
return $this->belongsTo('App\Models\User');
}
public function teg(){
return $this->belongsTo('App\Models\Teg');
}
public function comments(){
return $this->hasMany('App\Models\Comment');
}

}