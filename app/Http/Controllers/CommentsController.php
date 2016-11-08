<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Comments;
use App\Http\Requests;
use DB;
use App\Models\Goods;

class CommentsController extends Controller
{
    public function show($id){
        $user = Auth::user();
        $goods = Goods::get()->where('id','==', $id);
        $comments=Comments::where('goods_id',$id)->where('type','ok')->paginate(4);

  return view('showcomments', ['goods' => $goods, 'comments' => $comments,  'user' => $user]);
        }

    public function save(Request $request, $id)
    {
        
       
        if(empty(Auth::user())){
        $this->validate($request, [
            'author' => 'required|max:100|min:5',
            'email' => 'required|email',
            'content'=>'required|min:5|max:400'
        ]);

        $all=$request->all();//Получаем все данные из формы в массив
         $all['goods_id']=$id;//Добавляем в массив id товара
       
        Comments::create($all);//Сохраняем в базу
        return back()->with('message','Thank you for your message. It will be publicated after admin checking!'); //редирект обратно к форме с сообщением
    }
    elseif(!empty($admin=Auth::user())&&$admin['type']!='A'){
            $this->validate($request, [
            'content'=>'required|min:5|max:400'
        ]);

$all=$request->all();
$all['author'] = Auth::user()->name;
$all['email'] = Auth::user()->email;
$all['goods_id']=$id;
$all['type']=NULL;
Comments::create($all);//Сохраняем в базу
        return back()->with('message','Thank you for your message. It will be publicated after admin checking!'); //редирект обратно к форме с сообщением
       
    }
      else{
        $this->validate($request, [
            'content'=>'required|min:5|max:400'
        ]);
$all=$request->all();
$all['author'] = Auth::user()->name;
$all['email'] = Auth::user()->email;
$all['goods_id']=$id;
//$all['type']= 'ok';
//Comments::create($all);//Сохраняем в базу
$comments_id = DB::table('comments')->insertGetId([
    'author' =>$all['author'],
           
            'email' => $all['email'],
            'goods_id' => $all['goods_id'],
            'content' => $all['content'],
            'type' => 'ok',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
 //DB::table('comments')->where('goods_id', $id)->update(['type' =>'ok']);
        return back()->with('message','Your message added!');

    }
      
}

}
