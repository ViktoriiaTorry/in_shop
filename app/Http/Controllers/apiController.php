<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Goods;
use App\User;
use Auth;
use App\Models\Categories;
use Illuminate\Http\Request;

use App\Http\Requests;

class apiController extends Controller
{
     public function goodsIndex()
        {
         $goods = Goods::all();
         $goods = json_encode($goods);
     
                    return $goods;
        }
           public function categoryIndex($id)
        {
         $goods = Categories::find($id)->goods;
           $goods = json_encode($goods);
                    return $goods;
        }
            public function goodsIdIndex($id)
        {
          $goods = Goods::find($id);
           $goods = json_encode($goods);
                    return $goods;
        }
        public function usersIndex()
        {
          $users = User::all();
           $users = json_encode($users);
                    return $users;
        }
        public function putOrderIndex(Request $request)
        {
            $input = $request->all();
//            $input = json_decode($request);

                $order_id = DB::table('orders')->insertGetId([
                'users_id' => $input['user_id'],
                'totalPrice' => $input['totalPrice'],
                'cities_id' => $input['cities_id'],
                'adress' => $input['adress']
            ]);


            for ($i = 0; $i < count($input); $i++) {
                DB::table('orders__goods')->insert([
                    'orders_id' => $order_id,
                    'goods_id' => $input['goods_id'],
                    'count' => $input['count']
                ]);
            }
            return view('Orders.saveOrder');
        }
        public function deleteOrder($id)
        {
            for ($i = 0; $i < count($id); $i++) {
                DB::table('orders__goods')->where(['orders_id' => $id])->delete();
                DB::table('orders')->delete([
                    'id' => $id,
                ]);
            }
            return view('Orders.deleteOrder');

        }

    }
