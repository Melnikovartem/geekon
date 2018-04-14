@extends('layouts.main')

@section('content')

<h2>Tasks:</h2>
<ul>
    @foreach($tasks as $task)
        <li><a href="/">{{$task->name}}</a></li>
    @endforeach
</ul>

@endsection
