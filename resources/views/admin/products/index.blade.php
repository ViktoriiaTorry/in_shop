<?
@extends('admin.layouts.app')
@section('content')
            <p> <a style="float:right"  href="/public/admin/products/create" role="button">Add new product</a></p><br>

            @foreach ($goods as $good)
            <div class="col-xs-6 col-lg-4">
            <p><img src="{{$good->img}}" width="50" height="50" > </p>
            <p style="font-weight: bold; font-size: 14"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,45)}}</a></p>
            {{--<p>{{$good->price}} usd</p>--}}
            <p> <a href="/public/admin/products/edit/{{$good->id}}" role="button">Edit ||</a>
             <a href="/public/admin/products/delete/{{$good->id}}" role="button">Delete</a></p>
            </div><!--/.col-xs-6.col-lg-4-->
@endforeach
@stop
