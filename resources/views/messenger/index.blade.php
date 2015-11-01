@extends('layouts.master')

@section('title')
Последние сообщения
@stop
@section('content')
    @if($threads->count() > 0)
        @foreach($threads as $thread)
        <?php $class = $thread->isUnread($user->id) ? 'alert-info' : ''; ?>
        <div class="media alert {{$class}}">
            <h2 class="media-heading">{{link_to('messages/' . $thread->id, $thread->subject,['target'=>'_blank'])}}
</h2>
@if($thread->latestMessage()->user_id != $user->id)
Автор: {{link_to($thread->latestMessage()->user_id,User::find($thread->latestMessage()->user_id)->login,['target'=>'_blank'])}}
@else
Вы писали: 
@endif

{{$thread->latestMessage()->body}}

{{--автора я сам сделал--}}

</div>
        @endforeach
    @else
        <p>У вас нет сообщений.</p>
    @endif
@stop