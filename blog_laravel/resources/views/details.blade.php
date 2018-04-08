@extends('layouts.main')

@section('content')

<h2>{{ $contact->name }}</h2>
<p>Company: {{$contact->job}}</p>
<p>Comment: {{$contact->comment}}</p>
<p>Email: {{$contact->email}}</p>

<h3>Phones:</h3>
<ul>
    @foreach($contact->phones as $phone)
        <li>{{ $phone->phone }} <a href="{{url('/phone/'.$phone->id.'/delete')}}">удалить</a></li>
    @endforeach
    <a href="{{url('/contact/'.$contact->id.'/add_phone')}}">добавить</a>
</ul>

<a href="{{url('/contact/'.$contact->id.'/edit')}}">Изменить</a><br>
<a href="{{url('/contact/'.$contact->id.'/delete')}}">Удалить</a><br>
<br><a href="{{url('/')}}">Назад</a>

@endsection
