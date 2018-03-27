@extends('base')

@section('content')
    <h2>Это страница H</h2>
    <form>
        @csrf
        <table>
          <tr><td>высота:</td><td><input type="text" name="h" /></td></tr>
          <tr><td>основание:</td><td><input type="text" name="a" /></td></tr>
        </table>
        <input type="submit">
    </form>
    @if ($ans != "")
      <h4>Ответ: {{$ans}}</h4>
    @endif
@endsection
