<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\shops_partners;
use App\Comments;
use App\Models\Categories;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class shops_partnersController extends Controller
{
     public function index()
    {
        $partners=Auth::shops_partners(); 
        var_dump($partners);
        return view('admin.partners', ['partners'=>$partners]);
    }



    //     public function add($id)
    // {
    //      DB::table('comments')
    //         ->where('id', $id)
    //         ->update(['type' => 'ok']);
    //     $comments=Comments::get()->where('type', '==',NULL); // выбираем все комментарии, который относятся к определенному товару
    //     return back();
    // }
    //     public function delete($id)
    // {
    //     $comments=Comments::find($id)->delete(); // выбираем все комментарии, который относятся к определенному товару
    //     return back();
    // }

      }



