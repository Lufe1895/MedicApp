<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pedido;
use App\User;
use App\State;

class PedidoController extends Controller
{
    protected function validator(array $data) 
    {
        return Validator::make($data, [
            'address' => ['required', 'string', 'max:50', 'min:2'],
            'phone' => ['required', 'numeric']
        ], [
            'address.required' => 'Se necesita una dirección.',
            'address.string' => 'La dirección debe ser válida',
            'address.max' => 'La dirección no puede tener más de 50 caracteres.',
            'address.min' => 'La dirección debe contener al menos 2 caracteres.',
            'phone.required' => 'Se necesita un teléfono.',
            'phone.numeric' => 'El teléfono solo puede contener números.'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $states = State::all();
        return view('pedidos.create', ['users' => $users, 'states' => $states]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pedido = Pedido::create($request->all());
        $pedido->save();
        return view('pedidos.show', ['pedido' => $pedido]);
    }

    public function new(Request $request) {
        $validator = $this->validator($request->all());

        if($validator->fails()) {
            return response()->json(["errors" => $validator->getMessageBag()], 422);
        }

        $pedido = Pedido::create([
            'meds' => $request->all()['meds'],
            'person_id' => $request->all()['person_id'],
            'pharmacy_id' => $request->all()['pharmacy_id'],
            'address' => $request->all()['address'],
            'phone' => $request->all()['phone'],
            'payment' => $request->all()['payment'],
            'total' => $request->all()['total'],
            'state_id' => 1
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pedido = Pedido::find($id);
        return view('pedidos.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $pedido = Pedido::find($id);
        $states = State::all();
        return view('pedidos.edit', ['users' => $users, 'pedido' => $pedido, 'states' => $states]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);
        $pedido->update($request->all());
        $pedido->save();

        return view('pedidos.show', ['pedido' => $pedido]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedido = Pedido::find($id);
        $pedido->delete();
        $pedidos = Pedido::all();
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function cancel($id) 
    {
        $pedido = Pedido::find($id);
        $pedido->state_id = 4;
        $pedido->save();
        return redirect('/pedidos/'. $id);
    }

    public function deliver($id) 
    {
        $pedido = Pedido::find($id);
        $pedido->state_id = 3;
        $pedido->save();
        return redirect('/pedidos/'. $id);
    }

    public function total($id, Request $request) 
    {
        $pedido = Pedido::find($id);
        $pedido->total = $request->all()['total'];
        $pedido->save();
        return redirect('/pedidos/'. $id);
    }

    public function pedidos(Request $request) 
    {
        $user = User::where('email', $request->all()['email'])->first();

        if($user) {
            $pedidos = $user->person->pedidos->all();
            if($pedidos) {
                return response()->json([
                    'status' => 'Correcto',
                    'pedidos' => $pedidos
                ]);
            }

            return response()->json([
                'status' => 'Nulo',
                'pedidos' => 'Usted no tiene pedidos.'
            ]);
        }

        return response()->json([
            'status' => 'Error',
            'message' => 'El usuario no existe.'
        ]);
    }

    public function viewCompra() 
    {
        return view('pedidos.compra');
    }
}
