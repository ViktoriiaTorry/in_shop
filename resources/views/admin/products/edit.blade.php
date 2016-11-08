
@extends('admin.layouts.app')
@section('content')

    <form method="POST">
        <div class="col-xs-6 col-lg-4">
            @foreach ($goods as $row)
                <p> Edit name:</p>
                <textarea name="name">{{$row->name}}</textarea>
                <p> Edit photo:</p>
                <textarea name="img">{{$row->img}}</textarea>
                <p> Edit excerpt:</p>
                <textarea name="excerpt">{{$row->excerpt}}</textarea>
                <p> Edit description:</p>
                <textarea name="description">{{$row->description}}</textarea>
                <p> Edit price:</p>
                <textarea name="price">{{$row->price}}</textarea>
            @endforeach
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <p> <button type="submit"  formaction = "/public/admin/products/update/{{$row->id}}">SAVE</button></p>
        </div><!--/.col-xs-6.col-lg-4-->
    </form>
@stop
