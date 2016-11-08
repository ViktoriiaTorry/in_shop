
@extends('admin.layouts.app')
@section('content')

    <form method="POST">
        <div class="col-xs-6 col-lg-4">

                <p> Add name:</p>
                <textarea name="name"></textarea>
                <p> Add photo:</p>
                <textarea name="img"></textarea>
                <p> Add excerpt:</p>
                <textarea name="excerpt"></textarea>
                <p> Add description:</p>
                <textarea name="description"></textarea>
                <p> Add price:</p>
                <textarea name="price"></textarea>
            <p>Select category:</p><br>
            <select name = "categories_id">
                <option value="0">-----select category-----</option>
                @foreach ($categories as $row)
                    "<option value='{{$row->id}}'>{{$row->name}}</option>";
                @endforeach
            </select><br>
                         <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <p> <button type="submit"  formaction = "/public/admin/products/store">Add product</button></p>
        </div><!--/.col-xs-6.col-lg-4-->
    </form>
@stop
@if(Session::has('message'))
    {{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif
