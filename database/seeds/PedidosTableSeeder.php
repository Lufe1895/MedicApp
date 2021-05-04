<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $pharmacy = User::find(2);
        $user = User::find(3);

        Pedido::create([
            'user_id' => $user->id,
            'pharmacy_id' => $pharmacy->id,
            'address' => $user->address,
            'phone' => $user->phone,
            'prescription' => '',
            'payment' => 'Efectivo',
            'state_id' => 1,
            'total' => 200.50
        ]);
    }
}
