@extends('base')

@section('content')
    <h2>Это страница R</h2>
    <form>
        @csrf
        <table>
          <tr><td>радиус вписанной окружности:</td><td><input type="text" name="r" /></td></tr>
          <tr><td>полупериметр:</td><td><input type="text" name="p" /></td></tr>
        </table>
        <input type="submit">
    </form>
    @if ($ans != "")
      <h4>Ответ: {{$ans}}</h4>
    @endif
@endsection
