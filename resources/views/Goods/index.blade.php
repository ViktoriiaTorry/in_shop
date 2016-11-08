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
                      @if(Session::has('message'))
   <p style="color:green"> {{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif

                      </div>
                    
@stop


@section('content')

            @foreach ($goods as $good)
    <div class="col-sm-6 col-md-4"> 
        <div class="thumbnail" style="height:450; width:300;"> 
            <p><img src="{{$good->img}}" width="200" height="200" > </p>
            
            <div class="caption"> 
            <p style="font-weight: bold; font-size: 18"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,50)}}</a></p>
            {{substr(strip_tags($good->excerpt),0,80)}}...</br>
             <div class="caption">
            {{$good->price}} usd {{count($good->comments)}}  <a href="/public/comments/{{$good->id}}"><em style="color:#337ab7";> comments</em></a>
            <a href="/public/buy/{{ $good->id }}" role="button"><img style="position:absolute;" src="https://cdn4.iconfinder.com/data/icons/pretty-office-part-4-simple-style/128/Shopping-cart-insert.png"width="35" height="35"></a>

            </div> 
        </div> 
    </div> 
    </div> 
     @endforeach
   
 <div class="footer" align="center"> 
 
{{ $goods->links() }}
</div> 
@stop
