<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Goods;
use App\Comments;
use App\Http\Requests;

class MainController extends Controller
{
    public function index()
    {
        $goods = Goods::latest('id')->limit(3)->get();// для вывода на главной странице получаем последние 3 добавленные товара
        $products = Goods::all();// для вывода на главной странице получаем последние 3 добавленные товара
        $categories = Categories::all();
  $comments = Comments::latest('id')->limit(4)->get();
        return view('main', ['goods' => $goods, 'categories' => $categories, 'comments' => $comments, 'products' => $products]);
    }

    public function contacts()
    {
        return view('contacts');
    }
     public function about()
    {
        return view('about');
    }



}
