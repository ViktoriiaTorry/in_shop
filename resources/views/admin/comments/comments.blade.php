<?
@extends('admin.layouts.app')
@section('content')
<hr>
             <div class="comments">
                 <p style="font-weight: bold">Comments</p>
                 <ul>
                     @foreach($comments as $comment)
                      <div class="comment">
                        <span style="color: darkblue">  By: {{$comment->author}} {{$comment->created_at}}</span>
                         <ul>{{$comment->content}}</ul>

                         <a href="/public/admin/comments/public/{{$comment->id}}" role="button">Public</a>||<a href="/public/admin/comments/delete/{{$comment->id}}" role="button">Delete</a> </p>
                         </div>
                     @endforeach
                 </ul>
                 @if(Session::has('message'))
    <p style="color:green;" >{{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif
@if(Session::has('message1'))
    <p style="color:green;" >{{Session::get('message1')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif
             </div>
          
@stop