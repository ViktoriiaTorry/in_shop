

<?
@extends('admin.layouts.app')
@section('content')
    <div class="container">

        <div class="row row-offcanvas row-offcanvas-right">

            <div class="col-xs-12 col-sm-9">

                <div class="list-group">
                    <a href="/public/admin" class="list-group-item active">All sections</a>
                    <a href="/public/admin/products"class="list-group-item">List of products</a>
                    <a href="/public/admin/categories"class="list-group-item">List of categories</a>
                    <a href="/public/admin/comments"class="list-group-item">List of comments</a>
                
                   
                    

                </div>
                <div class="jumbotron">

                </div>
                <div class="row">

                </div><!--/row-->
            </div><!--/.col-xs-12.col-sm-9-->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">

            </div><!--/.sidebar-offcanvas-->
        </div><!--/row-->
    </div>
@stop





