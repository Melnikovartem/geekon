@extends('layouts.main')

@section('content')

<ul>
    @foreach($contacts as $contact)
        <li><a href="{{url('contact/'.$contact->id)}}">{{$contact->name}}</a> @if ($contact->job) ({{$contact->job}}) @endif</li>
    @endforeach
</ul>

<a href="{{url('/add')}}">Добавить</a>

@endsection
