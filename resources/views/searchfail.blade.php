<?
@extends('layouts.app')

    @section('content')
     {!!$text!!} 
     <form name="search" method="post" action="/public/search">
    <input type="search" name="query" placeholder="Search">
    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
    <button type="submit"><img src="http://downloadicons.net/sites/default/files/search-button-icon-13049.png" width="21" height="21" ></button> 
</form>
    @stop