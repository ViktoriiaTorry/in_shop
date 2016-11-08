<?

@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row row-offcanvas row-offcanvas-right">
            <div class="col-xs-12 col-sm-9">
                <div class="jumbotron">
                    <h3>You added next goods:</h3>
                </div>
                <form method="POST">
                   @foreach($goods as $row)
                        {{$row->name}}<br>
                        Price per unit: {{$row->price}}usd<br>
                        Number of units:
                        <input type = "number"  autofocus min="1" name = "quantity[]"><br>
                    @endforeach
                    <p><input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <p><input type="hidden" name="price" value=" ]{{$row->price}}]"/>
                    <p><input type="hidden" name="goods_id" value="]{{$row->id}}]"/>

                    {{--<p><input type="hidden" name="price" value="{{$row->price}}"/>--}}
                    <p> <button type="submit"  formaction = "/public/buy/{{$row->id}}">Add to basket</button></p>
                </form>
            </div><!--/.col-xs-12.col-sm-9-->
        </div><!--/row-->
    </div>
@stop
























