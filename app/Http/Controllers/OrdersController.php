<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use Cookie;
use Illuminate\Cookie\CookieJar;
use Illuminate\Http\Request;
use App\Orders;
use App\Http\Requests;
use App\Models\Goods;
use App\Cities;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class OrdersController extends Controller
{
    public function index($id = null)
    {
        $goods = Goods::get()->where('id', '==', $id);
        $cities = Cities::all();
        return view('Orders.orders', ['goods' => $goods, 'cities' => $cities]);
    }

    public function addToBasket($id)
    {

        $count = 1;
        if (!Cookie::get('goods_basket')) {
            Cookie::queue('goods_basket', json_encode(['goods_id' => $id, 'count' => $count]), 3600);
            //return back();
        }

     
        $old_cookie = json_decode(Cookie::get('goods_basket'), true);
        $old_cookie[] = ['goods_id' => $id, 'count' => $count];


                 Cookie::queue('goods_basket', json_encode($old_cookie), 3600);
            return back();
               }
   
    public function basket()
    {
        $cities = Cities::all();
        if (Cookie::get('goods_basket')){
        $getCookies = Cookie::get('goods_basket');
        $goods_id = json_decode($getCookies);
        for ($i = 0; $i < count($goods_id); $i++) {
            $arr[] = Goods::find($goods_id[$i]->goods_id);
          //  var_dump($arr).die();
        }
         for ($i = 0; $i < count($goods_id); $i++){
                $count[]= $goods_id[$i]->count;
                 }
       
          // var_dump($count).die();
        return view('Orders.basket', ['arr' => $arr,'count' => $count, 'cities'=>$cities]);
    }
    else{
        return view('Orders.basketempty');
    }
    }

    public function clearBasket()
    {               Cookie::queue('goods_basket', NULL, -1);
      return back()->with('message','Your basket is empty!');
    }

    public function checkOrder(Request $request)
    {

        
         $getCookies = Cookie::get('goods_basket');
        if(isset($getCookies)){
                $user=Auth::user();
        

        if(!empty($user)){
              
        $this->validate($request, [
        'adress' => 'required|max:255',
        'cities_id' => 'required|not_in:0',
    ]);
       
         $all = $request->all();//Получаем все данные из формы в массив
        $cities = Cities::find($all['cities_id']);
        $all['cities'] = $cities;
        $prices = $all['price'];
        // $count = $all['quantity'];
        $goods_id = json_decode($getCookies);
 
for ($i = 0; $i < count($goods_id); $i++){
                $count[]= $goods_id[$i]->count;
         }
        //   var_dump($count);
        $name = $all['name'];
        $newPrices = [];
        foreach ($count as $key => $value) {
            $newPrices[$key] = $value * $prices[$key];
        }
        $totalPrice = 0;
        foreach ($count as $key => $value) {
            $totalPrice += $value * $prices[$key];
        }
 
        return view('Orders.checkOrder', ['all' => $all, 'cities' => $cities, 'newPrices' => $newPrices, 'totalPrice' => $totalPrice, 'name' => $name, 'count' => $count]);
        }else{
        return back()->with('message','Sorry, you are not an authorized! Log in in order to proceed to chechout!');
 }
}else{
 return view('Orders.basketempty');
}
}

    public function saveCount(Request $request)
    {
              $getCookies = Cookie::get('goods_basket');
       $goods_id = json_decode($getCookies);
 
for ($i = 0; $i < count($goods_id); $i++){
                $quantity[]= $goods_id[$i]->count;
         }
       // Cookie::queue('goods_basket', NULL, -1);
        $all = $request->all();
        $count = $all['quantity'];
        $id = $all['id'];
      
               foreach ($count as $key =>$value) {
           if(empty($count[$key])){
            $count[$key]=$quantity[$key];
               }
        
            $old_cookie[] = ['goods_id' =>$id[$key] , 'count' => $count[$key]];
            Cookie::queue('goods_basket', json_encode($old_cookie), 3600);
     
       }
        return redirect('/goods');
    }
    public function save(Request $request)
    {
              $getCookies = Cookie::get('goods_basket');
       $goods_id = json_decode($getCookies);
 
for ($i = 0; $i < count($goods_id); $i++){
                $quantity[]= $goods_id[$i]->count;
         }
       // Cookie::queue('goods_basket', NULL, -1);
        $all = $request->all();//Получаем все данные из формы в массив
        $count = $all['quantity'];
        $id = $all['id'];
      
               foreach ($count as $key =>$value) {
           if(empty($count[$key])){
            $count[$key]=$quantity[$key];
               }
        
            $old_cookie[] = ['goods_id' =>$id[$key] , 'count' => $count[$key]];
            Cookie::queue('goods_basket', json_encode($old_cookie), 3600);
     
       }
        return back();
    }
    public function saveOrder(Request $request)
    {
        $getCookies = Cookie::get('goods_basket');
        if(isset($getCookies)){
        $input = $request->all();
         
        $user = Auth::user();
        $order_id = DB::table('orders')->insertGetId([
            'users_id' => $user['id'],
            'totalPrice' => $input['totalPrice'],
            'cities_id' => $input['cities_id'],
            'adress' => $input['adress']
        ]);

        $getCookies = Cookie::get('goods_basket');
        $goods_id = json_decode($getCookies);

        for ($i = 0; $i < count($goods_id); $i++) {
            DB::table('orders__goods')->insert([
                'orders_id' => $order_id,
                'goods_id' => $goods_id[$i]->goods_id,
                'count' => $goods_id[$i]->count
            ]);
        }
        return view('Orders.saveOrder')->withCookie(Cookie::queue('goods_basket', NULL, -1));
    }
     return view('Orders.basketempty');
}
}