<?
@extends('admin.layouts.app')
@section('content')


            @foreach ($partners as $row)
            <div class="col-xs-6 col-lg-4">
           
            {{--<p>{{$row->name}}</p>--}}
            {{--<p>{{$row->api_token}}</p>--}}
    
            </div><!--/.col-xs-6.col-lg-4-->
@endforeach
@stop
