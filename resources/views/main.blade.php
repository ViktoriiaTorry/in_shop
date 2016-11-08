

<?
@extends('layouts.app')
@section('content')
    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
                </p>
                <div class="jumbotron">
                    <h2>Welcome to InShop!</h2>
                    <p>The first and the leading internet-shop of radio models and quadrocopters!</p>
                </div>
           
         <div class="page-header">
        <p style="font-weight:bold;font-size:20;color:#337ab7;">Latest models</p>
       </div>
  

<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item" style="text-align: center;" >
           <h3 >{{$goods[0]['name']}}</h3>
            <img src="{{$goods[0]['img']}}"width="444" style="position:relative;" height="150"  data-holder-rendered="true">
           <h3>{{$goods[0]['price']}} USD</h3>
            <a class="btn btn-large btn-block" href="/public/goods/{{$goods[0]['id']}}">View details »</a> 
          </div>
          <div class="item active" style="text-align: center;">
           <h3>{{$goods[1]['name']}}</h3>
            <img  src="{{$goods[1]['img']}}" width="444" height="150"data-holder-rendered="true">
            <h3>{{$goods[1]['price']}} USD</h3>
             <a class="btn btn-large btn-block" href="/public/goods/{{$goods[1]['id']}}">View details »</a>
          </div>
          <div class="item" style="text-align: center;">
           <h3>{{$goods[2]['name']}}</h3>
            <img src="{{$goods[2]['img']}}" width="444" height="150" data-holder-rendered="true">
            <h3>{{$goods[2]['price']}} USD</h3>
             <a class="btn btn-large btn-block" href="/public/goods/{{$goods[2]['id']}}">View details »</a>
          </div>
        </div>
        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

<style type="text/css"> 
.carousel-inner > .item > img {
    margin: 0 auto;
}.carousel-inner > .item > h2 {
    margin: 0 auto;
}

</style> 

            </div><!--/.col-xs-12.col-sm-9-->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <a href="/public/goods" class="list-group-item active">All categories</a>
                    @foreach ($categories as $category)
                        <a href="/public/category/{{ $category->id }}"class="list-group-item">{{ $category->name }}</a>
                    @endforeach
                        </div>
            </div>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" style="bottom:-47px" id="sidebar">
                <div class="list-group">
          
                      <ul>

                      <hr>
                       <p style="font-weight:bold;font-size:20;color:#337ab7;">Latest customer reviews:
                     @foreach($comments as $comment)
                      <p><div class="comment">
                       <p> <span style="color: darkblue">  By: {{$comment->author}} {{$comment->created_at}}</span></p>
                         <ul>{{$comment->content}}</ul>
                         </div>
                     @endforeach
                 </ul>

             
                </div>
            </div><!--/.sidebar-offcanvas-->
        </div><!--/row-->
    </div>
@stop





