<?
use Carbon\Carbon;
use Cmgmyr\Messenger\Models\Thread;
use Cmgmyr\Messenger\Models\Message;
use Cmgmyr\Messenger\Models\Participant;
use Illuminate\Support\Facades\Auth;

class MessagesController extends BaseController{
public function __construct(){
$this->beforeFilter('auth');
$this->beforeFilter('csrf', ['on' => 'post']);
parent::__construct();
if(empty($this->user)){
Session::flash('message', 'Для просмотра необходимо войти');
}
}

    public function index()
    {
        $currentUserId = $this->user->id;
        //все темы, игнорировать удаленные/архивные
$threads = Thread::getAllLatest();
//все темы в котлорых участвует пользователь
        //$threads = Thread::forUser($currentUserId);
//все темы, в которых участвует пользователь - новые сообщения
        //$threads = Thread::forUserWithNewMessages($currentUserId);

        return View::make('messenger.index', compact('threads', 'currentUserId'));
    }

    public function show($id)
    {
        try{
$thread = Thread::findOrFail($id);
// отображения текущего пользователя в список, если не текущий участник 
        //$users = User::whereNotIn('id', $thread->participantsUserIds())->get();
// не показывать текущего пользователя в список 
        $userId = $this->user->id;
        $users = User::whereNotIn('id', $thread->participantsUserIds($userId))->get();

        $thread->markAsRead($userId);

        return View::make('messenger.show', compact('thread', 'users'));
}catch(Exception $e){
return Redirect::to()->withError('Темы с таким номером нет');
//$e->getMessage();
}

    }

    /**
     * Creates a new message thread
     *
     * @return mixed
     */
    public function create()
    {
        $users = User::where('id', '!=', $this->user->id)->get();

        return View::make('messenger.create', compact('users'));
    }

    /**
     * Stores a new message thread
     *
     * @return mixed
     */
    public function store()
    {
        $input = Input::all();

        $thread = Thread::create(
            [
                'subject' => $input['subject'],
            ]
        );

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => $this->user->id,
                'body'      => $input['message'],
            ]
        );

        // Sender
        Participant::create(
            [
                'thread_id' => $thread->id,
                'user_id' => $this->user->id,
                'last_read' => new Carbon
            ]
        );

        // Recipients
        if (Input::has('recipients')) {
            $thread->addParticipants($input['recipients']);
        }

        return Redirect::to('messages')->with('message', 'сообщение сохраненно');
    }

    public function update($id)
    {
        $thread = Thread::findOrFail($id);

        $thread->activateAllParticipants();

        // Message
        Message::create(
            [
                'thread_id' => $thread->id,
                'user_id'   => $this->user->id,
                'body'      => Input::get('message'),
            ]
        );

        // Add replier as a participant
        $participant = Participant::firstOrCreate(
            [
                'thread_id' => $thread->id,
                'user_id'   => $this->user->id
            ]
        );
        $participant->last_read = new Carbon;
        $participant->save();
// Recipients
//if (Input::has('recipients')) {
//$thread->addParticipants(Input::get('recipients'));
//}
return Redirect::to('messages/' . $id);
    }
}
