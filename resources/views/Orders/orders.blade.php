<?
@extends('layouts.app')
@section('content')
 <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">
                 <div class="jumbotron">
                    <h3>To order good, please, fill the next information!</h3>
                         </div>
               
                  
 <form method="POST">
   Adress:<br>
    <input type="text" name="adress"/><br>
    Select your city:<br>
     <select name = "cities_id">
         <option value="0">-----select city-----</option>
         @foreach ($cities as $city)
              "<option value='{{$city->id}}'>{{$city->city}}</option>";
         @endforeach
     </select><br>
     Number of units:<br>
   <input type = "number"  autofocus min="1" name = "quantity"><br>


      <p><input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <p><input type="submit"  value="Check order"/><p>
</form>      
                
            </div><!--/.col-xs-12.col-sm-9-->

            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
                <div class="list-group">
                    <p class="list-group-item active">You choosed</p>
                        @foreach ($goods as $good)
                        <p><img src="{{$good->img}}" width="200" height="200" > </p>
                        <p style="font-weight: bold; font-size: 18"><a href="/public/goods/{{$good->id}}" role="button">{{substr(strip_tags($good->name),0,45)}}</a></p>
                        	<p>{{substr(strip_tags($good->excerpt),0,120)}}... </p>
                        <p style = font-weight:bold; font-size:18;>{{$good->price}} usd per 1 unit</p>
                        {{--<p> <a style = font-weight:bold; href="/public/orders/{{$good->id}}" role="button">Check order&raquo;</a></p>--}}
                    @endforeach
             </div>
            </div><!--/.sidebar-offcanvas-->
        </div><!--/row-->
    </div>

 @if($_REQUEST )
     @include('Orders.checkOrder')
 @endif

@stop
























