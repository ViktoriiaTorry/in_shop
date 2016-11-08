
@extends('admin.layouts.app')
@section('content')

    <form method="POST">
        <div class="col-xs-6 col-lg-4">
            @foreach ($categories as $row)
                <p> Edit name:</p>
                <textarea name="name">
         {{ltrim($row->name)}}
        </textarea>
            @endforeach

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <p> <button type="submit"  formaction = "/public/admin/categories/update/{{$row->id}}">SAVE</button></p>
        </div><!--/.col-xs-6.col-lg-4-->
    </form>
@stop
