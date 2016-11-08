<?
@extends('layouts.app')
@section('content') 
  <div class="col-sm-6 col-md-4"> 
        <div class="thumbnail" style="height:800; width:1000;"> 

     
 			@foreach ($goods as $good)
 	<p style="font-weight: bold; font-size: 26"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,50)}}</a></p>
 			@endforeach
             <h3>Customer reviews:</h3>
             <hr>
            @foreach($comments as $comment)
            <div class="caption"> 
                <p><div class="comment"></p>
                    <span style="color: darkblue">  By: {{$comment->author}} {{$comment->created_at}}</span>
                    <ul>{{$comment->content}}</ul>
                    <hr>
               		</div>
               		</div>
                    @endforeach
                   @if(($good->id)&&($user['id']))
                 @include('commentUser')
                 @else 
                 @include('comment')
             @endif
             {{ $comments->links() }}
</div>
</div>

 <div class="col-sm-6 col-md-4"> 
 <div   class="thumbnail" style="height:800; width:400; position: absolute; right:-680px;"> 
        
        @foreach ($goods as $good)
        <p><img src="{{$good->img}}" width="250" height="250" > </p>
         <p style="font-weight: bold; font-size: 20"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,50)}}</a></p>
            	{{substr(strip_tags($good->excerpt),0,80)}}...</br>
            		<p>{{$good->price}} usd <a href="/public/buy/{{ $good->id }}" role="button"><img style="position:absolute;" src="https://cdn4.iconfinder.com/data/icons/pretty-office-part-4-simple-style/128/Shopping-cart-insert.png"width="35" height="35"></a>
    @endforeach

</div>

</div>

@stop