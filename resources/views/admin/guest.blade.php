@foreach($guests as $guest)
{{$guest->name}}<br>
{{$guest->email}}<br>
{{$guest->text}}<br>
{{HTML::link('admin/guest-del/'.$guest->id, 'удалить')}}
@endforeach