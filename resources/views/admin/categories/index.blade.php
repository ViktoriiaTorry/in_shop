<?
@extends('admin.layouts.app')
@section('content')
            <p> <a  href="/public/admin/categories/create" role="button">Add new category</a></p><br>

            @foreach ($categories as $row)

            <p>{{$row->name}} </p>


            <p> <a href="/public/admin/categories/edit/{{$row->id}}" role="button">Edit ||</a>
             <a href="/public/admin/categories/delete/{{$row->id}}" role="button">Delete</a></p>

@endforeach
@stop
