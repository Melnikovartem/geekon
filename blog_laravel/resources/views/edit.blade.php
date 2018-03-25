<form method="POST">
        @csrf
        <label>Имя</label>
        <input type="text" name="name" required value="{{$contact->name}}"><br>
        <label>Компания</label>
        <input type="text" name="job" value="{{$contact->job}}"><br>
        <label>Email</label>
        <input type="text" name="email" value="{{$contact->email}}"><br>
        <label>Комментарий</label>
        <textarea name="comment">{{$contact->comment}}</textarea><br>
        <input type="submit" value="Изменить">
</form>

<a href="{{url('/')}}">Назад</a>
