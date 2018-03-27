@extends('base')

@section('content')
    <h2>Это страница P</h2>
    <form>
        @csrf
        <table>
          <tr><td>сторона 1:</td><td><input type="text" name="a" /></td></tr>
          <tr><td>сторона 2:</td><td><input type="text" name="b" /></td></tr>
          <tr><td>сторона 3:</td><td><input type="text" name="c" /></td></tr>
        </table>
        <input type="submit">
    </form>
    @if ($ans != "")
      <h4>Ответ: {{$ans}}</h4>
    @endif
@endsection
