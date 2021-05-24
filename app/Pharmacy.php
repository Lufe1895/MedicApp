<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Pedido;

class Pharmacy extends Model
{
    protected $fillable = [
        'name', 'phone', 'address', 'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function pedidos() {
        return $this->hasMany(Pedido::class);
    }
}
