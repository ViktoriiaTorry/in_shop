
@extends('admin.layouts.app')
@section('content')

    <form method="POST">
        <div class="col-xs-6 col-lg-4">

                <p> Add name:</p>
                <textarea name="name">
                </textarea>
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <p> <button type="submit"  formaction = "/public/admin/categories/store">Add category</button></p>
        </div><!--/.col-xs-6.col-lg-4-->
    </form>
@stop
@if(Session::has('message'))
    {{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif
