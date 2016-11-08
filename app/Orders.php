<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table="orders";
    protected $fillable=['users_id', 'adress','cities_id','goods_id','quantity', 'totalPrice'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function goods()
    {
        return $this->hasMany('App\Models\Goods','goods_id','id', 'users_id');
    }

}
