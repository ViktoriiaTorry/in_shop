<?

@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                 
                 <div class="jumbotron">
                    <h3><img src="https://cdn4.iconfinder.com/data/icons/adiante-apps-app-templates-incos-in-grey/512/app_type_shop_512px_GREY.png" width="100" height="100" >Your basket:</h3>
                         </div>
   <form method="POST">
        <div style="width:850px;" class="col-md-6">
          <table class="table" >
            <thead >
              <tr >
                <th></th>
                <th>Products</th>
                <th>Price(unit)</th>
                <th>Units:</th>
                <th style="text-align: center;">+ / -</th>
              </tr>
            </thead>
            @foreach($arr as $key=>$value)
            <tbody>

                     <td><img src="{{$value->img}}" width="100" height="100" ></td>
                     <td style="text-align: center;"><em style="font-weight: bold; font-size: 18;"><a href="/public/goods/{{$value->id}}" role="button">{{substr(strip_tags($value->name),0,50)}}</a></em></td>
                    <td>{{$value->price}}usd</td>
                    <td>{{$count[$key]}}</td>
                  
                  
                    <td><input type = "number"  autofocus min="1" name = "quantity[]" ><br></td>
                       
                      

                    <p><input type="hidden" name="name[]" value="{{$value->name}}"/>
                    <p><input type="hidden" name="price[]" value="{{$value->price}}"/>
                    <p><input type="hidden" name="id[]" value="{{$value->id}}"/>
                    </tbody>
                    @endforeach
            </table>
            <button type="submit" class="btn btn-primary" formaction = "/public/basket/save" role="button">Save»</button>
            <button type="submit" class="btn btn-primary" formaction = "/public/basket/saveCount" role="button">Continue shopping »</button>
         <button  type="submit" class="btn btn-primary" formaction = "/public/basket/clear" role="button">Clear basket »</button>
        </div> 
        </div> 

  <div class="col-xs-6 col-sm-3 sidebar-offcanvas" style="bottom:0px" id="sidebar">  
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class=""></li>
          <li data-target="#carousel-example-generic" data-slide-to="1" class="active"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="item" style="text-align: center;" >
           <h3 >Sale</h3>
            <img src="https://uidesign.gearbest.com/GB/images/promotion/2016/October_Sale/banner.jpg"width="300" style="position:relative;" height="150"  data-holder-rendered="true">
           
            <a class="btn btn-large btn-block" href="#">View details »</a> 
          </div>

          <div class="item active" style="text-align: center;">
           <h3 >Sale</h3>
            <img src="https://uidesign.gearbest.com/GB/images/promotion/2016/s7/M_banner.jpg"width="300" style="position:relative;" height="150"  data-holder-rendered="true">
           
            <a class="btn btn-large btn-block" href="/public/goods">View details »</a> 
          </div>

          <div class="item" style="text-align: center;">
           <h3 >Sale</h3>
            <img src="https://uidesign.gearbest.com/GB/images/promotion/2016/tablet_Plus/hi10plusnew.jpg"width="300" style="position:relative;" height="150"  data-holder-rendered="true">
           
            <a class="btn btn-large btn-block" href="#">View details »</a> 
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
       </div> 
      
      

       <hr>
<div class="col-xs-6 col-sm-3 sidebar-offcanvas" style="width:270px" id="sidebar">
             
          
          <div class="panel panel-primary">
            <div class="panel-heading">
                <form method="POST">
                   
              <h3 class="panel-title"> Enter your street adress:</h3>
            </div>
            <div class="panel-body">
             <input type="text" name="adress"/><br>
            </div>
          </div>

          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Select your city:</h3>
            </div>
            <div class="panel-body">
             <select name = "cities_id">
                        <option value="0">-----select city-----</option><br>
                        @foreach ($cities as $city)
                            "<option value='{{$city->id}}'>{{$city->city}}</option>";
                        @endforeach
                    </select><br>
                </div>
          </div>
                 @if (count($errors) > 0)
            <ul>
                  @foreach ($errors->all() as $error)
                  <li style="color: red">{{ $error }}</li>
                  @endforeach
            </ul>
        @endif
       
         
        <button type="submit" class="btn btn-lg btn-success" style="position:absolute; right:20px;" formaction = "/public/basket/check" role="button">Proceed to checkout»</button><br>
        <hr>
        @if(Session::has('message'))
    <p style="color:red;" >{{Session::get('message')}} <!-- вывод сообщения об успешности добавления комментария -->
@endif
<p><input type="hidden" name="_token" value="{{csrf_token()}}"/>
                
 </form>
         </div>
         </div>
         </div>
        
      

@stop



















