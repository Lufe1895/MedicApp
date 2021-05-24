<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Pharmacy;
use App\Person;
use App\State;

class Pedido extends Model
{
    protected $fillable = [
        'person_id', 'pharmacy_id', 'address', 'phone', 'prescription', 'payment', 'state_id', 'total'
    ];

    public function person() {
        return $this->belongsTo(Person::class);
    }

    public function pharmacy() {
        return $this->belongsTo(Pharmacy::class);
    }

    public function state() {
        return $this->belongsTo('App\State');
    }
}
