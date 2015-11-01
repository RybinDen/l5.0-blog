<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model{
protected $table = 'yiisubscribers';
public  $timestamps = false;
protected $fillable = [//разрешаем массовое заполнение
'user_id',
'question_id',
];

public function user(){
return $this->belongsTo('App\Models\User');
}

}