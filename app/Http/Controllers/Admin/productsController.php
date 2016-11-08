<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Categories;
use App\Http\Requests;
use DB;
use App\Http\Controllers\Controller;

class productsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods = Goods::all();
        return view('admin.products.index', ['goods' => $goods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all();

            return view('admin.products.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all=$request->all();
        DB::table('goods')->insert(['name' => $all['name'],
            'excerpt' => $all['excerpt'],
            'description' => $all['description'],
            'price' => $all['price'],
            'img' => $all['img'],
            'categories_id' => $all['categories_id'],
        ]);
        return back()->with('message','Product was added!');
    }

     public function edit($id)
    {
        $goods = Goods::get()->where('id','==', $id);
        return view('admin.products.edit', ['goods' => $goods]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $all=$request->all();
        DB::table('goods')
            ->where('id', $id)
            ->update(['name' => $all['name'],
            'excerpt' => $all['excerpt'],
           'description' => $all['description'],
           'price' => $all['price'],
           'img' => $all['img'],
            ]);
return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Goods::find($id)->delete();
        return back();
    }
}
