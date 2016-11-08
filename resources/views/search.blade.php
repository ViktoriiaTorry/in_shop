<?
@extends('layouts.app')
    echo $text; 
   
   // echo $result; 
    @section('content')
     {!!$text!!} 
     @foreach ($result as $good)
            <div class="col-xs-6 col-lg-4">
            <span><p><img src="{{$good->img}}" width="200" height="200" > </p>
            <p style="font-weight: bold; font-size: 18"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,45)}}</a></p>
            <p>{{substr(strip_tags($good->excerpt),0,120)}}... </p>
           
            <p>{{$good->price}} usd  <a href="/public/buy/{{ $good->id }}" role="button"><img src="http://s1.iconbird.com/ico/2014/1/633/w256h2561390857232shopingcart256.png"width="40" height="40" ></a></p></span>
            
            </div><!--/.col-xs-6.col-lg-4-->
@endforeach

@stop