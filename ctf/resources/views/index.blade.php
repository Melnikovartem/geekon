@extends('layouts.app')

@section('content')

<h2>Tasks:</h2>
<ul>
    @foreach($tasks as $task)
        <li><a href="/task/{{$task->id}}/">{{$task->name}}</a></li>
    @endforeach
</ul>

@endsection
