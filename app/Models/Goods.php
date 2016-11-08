<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{

    public function getAll()
    {
        $goods = Goods::all();
        return $goods;
    }

    public function categories() {
        return $this->belongsTo('App\Categories');
    }
    public function comments()
    {
        return $this->hasMany('App\Comments','goods_id','id');
    }
    public function orders()
    {
        return $this->hasMany('App\Orders','goods_id','id', 'users_id');
    }
}
