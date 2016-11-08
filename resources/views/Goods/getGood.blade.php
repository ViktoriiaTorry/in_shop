<?
@extends('layouts.app')
@section('category') <div class="col-sm-6 col-md-4"style="height:420; width:300;"> 
            <a href="/public/goods" class="list-group-item active">All categories</a>
            @foreach ($categories as $category)
                <a href="/public/category/{{ $category->id }}"class="list-group-item">{{ $category->name }}</a>
            @endforeach
            <hr>
            </div>
 
<div class="col-sm-6 col-md-4" style="height:120; width:100;top:-170px;"> 
      
                      <p> <a href="/public/basket" role="button"><img src="https://cdn3.iconfinder.com/data/icons/flatastic-4-2-2/256/shopping-cart-full-128.png"width="40" height="40" ><br>basket</a>
                      </div>
<div class="col-sm-6 col-md-4" style="height:140; width:120;top:-170px;"> 
                      <a href="/public/basket/clear" role="button"><img src="https://cdn4.iconfinder.com/data/icons/pretty-office-part-4-simple-style/256/Shopping-cart-remove.png"width="40" height="40" ><br>empty </a></p>
                      </div>
                    
@stop
@section('content')

             @foreach ($goods as $good)
                 <p><img src="{{$good->img}}" width="250" height="250" > </p>
             <h3>{{$good->name}}</h3>
            <p>{{strip_tags($good->description)}} </p>
            <p>{{$good->price}} usd <a href="/public/buy/{{ $good->id }}" role="button"><img src="https://cdn4.iconfinder.com/data/icons/pretty-office-part-4-simple-style/128/Shopping-cart-insert.png"width="40" height="40" ></a>
    @endforeach
            
<hr>
             <div class="comments">
                 <p style="font-weight: bold">Comments</p>
                 <ul>
                     @foreach($comments as $comment)
                      <div class="comment">
                        <span style="color: darkblue">  By: {{$comment->author}} {{$comment->created_at}}</span>
                         <ul>{{$comment->content}}</ul>
                         </div>
                     @endforeach
                 </ul>
             </div>
             @if(($good->id)&&($user['id']))
                 @include('commentUser')
                 @else 
                 @include('comment')
             @endif
             
@stop
