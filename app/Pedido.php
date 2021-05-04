<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\State;

class Pedido extends Model
{
    protected $fillable = [
        'user_id', 'pharmacy_id', 'address', 'phone', 'prescription', 'payment', 'state_id', 'total'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function pharmacy() {
        return $this->belongsTo('App\User');
    }

    public function pedido() {
        return $this->belongsTo('App\State');
    }
}
