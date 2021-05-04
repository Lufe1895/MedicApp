<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pedido extends Model
{
    protected $fillable = [
        'user_id', 'farmacia_id', 'direccion', 'phone', 'receta', 'tipo_pago', 'total'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'foreign_key');
    }

    public function pharmacy() {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
