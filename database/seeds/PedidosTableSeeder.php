<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Pharmacy;
use App\Person;
use App\Pedido;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pharmacy = Pharmacy::find(1);
        $user = Person::find(2);

        Pedido::create([
            'person_id' => $user->id,
            'pharmacy_id' => $pharmacy->id,
            'meds' => 'Trimetroprima, 5; Paracetamol, 1;',
            'address' => $user->address,
            'phone' => $user->phone,
            'prescription' => '',
            'payment' => 'Efectivo',
            'state_id' => 2,
            'total' => 200.50
        ]);
    }
}
