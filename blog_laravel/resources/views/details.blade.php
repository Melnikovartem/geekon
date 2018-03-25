<h2>{{ $contact->name }}<br>
    <small>{{$contact->job}}</small>
</h2>
<p>{{$contact->comment}}</p>
<p>{{$contact->email}}</p>

<a href="{{url('/contact/'.$contact->id.'/edit')}}">Изменить</a>
<a href="{{url('/')}}">Назад</a>

