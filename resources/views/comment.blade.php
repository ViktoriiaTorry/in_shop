<form method="POST">
    Your name:<br>
    <input type="text" name="author"/><br>
    Your email:<br>
    <input type="text" name="email"/><br>
    Your message:<br>
    <textarea name="content"></textarea><br>
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <input type="submit" value="Send"/>
</form>


@if (count($errors) > 0)
    <ul>
        @foreach ($errors->all() as $error)
            <li style="color: red">{{ $error }}</li>
        @endforeach
    </ul>
@endif

@if(Session::has('message'))
    {{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif

