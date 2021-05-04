<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $fillable = [
        'name',
        'description'
    ];

    public function pedido() {
        return $this->hasMany('App\Pedido');
    }
}
