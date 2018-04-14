@extends('layouts.main')

@section('content')

<form method="POST">
        @csrf
        <label>Вебсайт</label>
        <input type="text" name="website" required value="{{old('phone')}}"><br>
        <input type="submit" value="Добавить">
</form>

<a href="{{url('/contact/'.$contact->id)}}">Назад</a>

@endsection
