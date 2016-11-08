<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Comments;
use App\Models\Categories;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class commentsController extends Controller
{
     public function index()
    {
        $comments=Comments::get()->where('type', '==',NULL); // выбираем все комментарии, который относятся к определенному товару
        return view('admin.comments.comments', ['comments'=>$comments]);
    }
        public function add($id)
    {
         DB::table('comments')
            ->where('id', $id)
            ->update(['type' => 'ok']);
        $comments=Comments::get()->where('type', '==',NULL); // выбираем все комментарии, который относятся к определенному товару
        return back()->with('message1','Comment publicated!');;
    }
        public function delete($id)
    {
        $comments=Comments::find($id)->delete(); // выбираем все комментарии, который относятся к определенному товару
        return back()->with('message','Comment deleted!');
    }

      }



