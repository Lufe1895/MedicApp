<?php

use Illuminate\Database\Seeder;
use App\State;

class StatesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        State::create([
            'name' => 'En revisión',
            'description' => 'Su pedido está en proceso de revisión'
        ]);

        State::create([
            'name' => 'En proceso de entrega',
            'description' => 'Su pedido está en proceso de entrega'
        ]);

        State::create([
            'name' => 'Entregado',
            'description' => 'Su ha llegado a su destino con éxito'
        ]);

        State::create([
            'name' => 'Cancelado',
            'description' => 'Su pedido ha sido cancelado por usted o por la farmacia'
        ]);

        State::create([
            'name' => 'Perdido',
            'description' => 'Desafortunadamente su pedido se ha perdido'
        ]);
    }
}
