@extends('layouts.main')

@section('content')

<form method="POST">
        @csrf
        <label>Имя</label>
        <input type="text" name="name" required value="{{old('name')}}"><br>
        <label>Компания</label>
        <input type="text" name="job" value="{{old('job')}}"><br>
        <label>Email</label>
        <input type="text" name="email" value="{{old('email')}}"><br>
        <label>Комментарий</label>
        <textarea name="comment">{{old('comment')}}</textarea><br>
        <input type="submit" value="Добавить">
</form>

<a href="{{url('/')}}">Назад</a>

@endsection
