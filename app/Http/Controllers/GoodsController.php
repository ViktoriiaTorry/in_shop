<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Goods;
use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
class GoodsController extends Controller
{
     public function index( $id = null){
        $categories = Categories::all();
            $goods = Goods::paginate(6);

        return view('Goods.index', ['goods' => $goods, 'categories' => $categories]);
        }

    public function goodAction($id = null){
            $user = Auth::user();
            $categories = Categories::all();
            $goods = Goods::get()->where('id','==', $id);
            $comments=Goods::find($id)->comments->where('type', '==','ok'); // выбираем все комментарии, который относятся к определенному товару
            $countComments=count($comments);
        return view('Goods.getGood', ['goods' => $goods, 'categories' => $categories, 'comments'=>$comments, 'user' =>$user]);
    }
    public function categoryAction($id)
    {
        $goods=Goods::where('categories_id', $id)->paginate(6);
            $categories = Categories::all();
        return view('Goods.index', ['goods' => $goods, 'categories' => $categories]);
   }
    public function search (Request $request){ 
            $all=$request->all();
            $query=$all['query'];
                if (empty($query)){ 
                    $text = '<p>Enter a search query</p>';
        return view('searchfail', ['text' => $text]);
    }
            if (!empty($query)){ 
                if (strlen($query) < 3){
                    $text = '<p>Too short a search query.</p>';
                } else if (strlen($query) > 128) {
                    $text = '<p>Too long a search query.</p>';
                } else { 
                    $result =DB::table('goods')->where([['name', 'LIKE', '%' .$query.'%']])->orWhere([['description','like', '%'.$query.'%']])->get();
                    $text = '<p>On request <b>'.$query.'</b> found concurrences: '.count($result).'</p>';
                return view('search', ['text' => $text, 'result' => $result]);
                }
        return view('searchfail', ['text' => $text]);
            }
        }
    }



