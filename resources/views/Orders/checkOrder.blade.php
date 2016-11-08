<?
@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <p class="pull-right visible-xs">
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button></p>
                     
        <div class="jumbotron">
                    <h3>Checkout!</h3>
                    
                    </div>      



 <div style="width:850px;" class="col-md-6">
          <table class="table" >
            <thead >
              <tr >
              <th>City</th>
                <th >Your street adress</th>
              </tr>
            </thead>
                   <tbody>
                      <td>{{$all['cities']->city}}</td>
                       <td >{{$all['adress']}}</td>             
                    <td>
                    </tbody>
              
            </table>
                  <form method="POST">
        <div style="width:850px;" class="col-md-6">
          <table class="table" >
            <thead >
              <tr >
                <th>Products</th>
                <th>Quantity</th>
                <th>Amount</th>
              </tr>
            </thead>
            @foreach ($name as $key=>$value)
            <tbody>

              
                     <td><em style=" font-size: 18;"><em> {{substr(strip_tags($value),0,50)}}</em></td>
                   <td>{{$count[$key]}} units</td>
                    <td>{{$newPrices[$key]}}usd</td>
                    @endforeach
                        
                     
               
                    </tbody>
                    
            </table>
           
         
          <form method="POST">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <input type="hidden" name="totalPrice" value="{{$totalPrice}}"/>
                         <hr><p  style="position:relative;right:-610px; font-size:20;font-weight:bold;"> TotalPrice: {{$totalPrice}} usd
                           <p><input type="hidden" name="cities_id" value="{{$all['cities_id']}}"/>
                            <p><input type="hidden" name="adress" value="{{$all['adress']}}"/>
                              <hr><p style="position:relative;right:-610px;"> <button type="submit" class="btn btn-lg btn-success"   formaction = "/public/orders/confirmation">Confirm order</button><p>
            </form>

            </div><!--/.col-xs-12.col-sm-9-->
        </div><!--/row-->
    </div>
    </div>
    </div>
      
 
@stop

?>


















