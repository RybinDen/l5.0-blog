<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Teg extends Model{
protected $table = 'yiitegs';
public $timestamps = false;
public function topics(){
return $this->hasMany('App\Models\Topic');
}
public function questions(){
return $this->belongsToMany('App\Models\Question','yiiquestion_teg');
}

}