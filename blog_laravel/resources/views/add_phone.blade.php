@extends('layouts.main')

@section('content')

<form method="POST">
        @csrf
        <label>Телефон</label>
        <input type="text" name="phone" required value="{{old('phone')}}"><br>
        <input type="submit" value="Добавить">
</form>

<a href="{{url('/contact/'.$contact->id)}}">Назад</a>

@endsection
