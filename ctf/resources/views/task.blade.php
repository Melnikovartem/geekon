@extends('layouts.app')

@section('content')

<h2>Tasks:</h2>
<ul>
    <h1>{{$task->name}}</h1>
    <p>{{$task->text}}</p>

    @if ($user) <h5>Можете отправить решение, {{$user->name}}!</h5>@endif
</ul>

@endsection
