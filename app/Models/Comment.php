<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model{
protected $table = 'yiicomments';
//protected $softDelete = true;
protected $fillable = ['content','user_id','topic_id'];
public function user(){
return $this->belongsTo('App\Models\User');
}
public function topic(){
return $this->belongsTo('App\Models\Topic');
}

}