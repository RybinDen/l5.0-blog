<? namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Answer extends Model{
protected $table = 'yiianswers';
protected $fillable = [//разрешаем массовое заполнение
'user_id',
'question_id',
'description',
];
protected $touches = ['question'];//обновление времени вопроса
public function question(){
return $this->belongsTo('App\Models\Question');
}
public function user(){
return $this->belongsTo('App\Models\User');
}

}