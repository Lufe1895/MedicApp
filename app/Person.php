<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pedido;

class Person extends Model
{
    protected $fillable = [
        'name', 'last_name', 'phone', 'address', 'sex', 'age', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }
}
