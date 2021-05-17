<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Role;

class UserController extends Controller
{
    protected function validator(array $data) {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'last_name' => ['string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:10'],
            'address' => ['required', 'string'],
            'age' => ['numeric'],
        ], [
            'name.required' => 'El NOMBRE es obligatorio.',
            'name.max' => 'No puede contener más de 30 caracteres.',
            'last_name.max' => 'No puede contener más de 30 caracteres.',
            'email.required' => 'El CORREO es obligatorio.',
            'email.email' => 'Debe introduccion un CORREO valido.',
            'email.unique' => 'Este CORREO ya ha sido registrado.',
            'password.required' => 'La CONTRASEÑA es obligatoria.',
            'password.min' => 'Debe contener al menos 8 caracteres.',
            'password.confirm' => 'Las CONTRASEÑAS no coinciden.',
            'phone.required' => 'El numero de TELEFONO es obligatorio.',
            'phone.numeric' => 'Tienen que ser un TELEFONO valido.',
            'address.required' => 'La DIRECCION es obligatoria.',
        ]);
}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'email' => $request['email'],
            'api_token' => Str::random(60),
            'password' => Hash::make($request['password']),
            'phone' => $request['phone'],
            'address' => $request['phone'],
            'sex' => $request['sex'],
            'age' => $request['age'],
        ]);

        $user->roles()->attach(Role::where('name', $request['role'])->first());
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user'=>$user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
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
        $user = User::find($id);
        $user->update($request->all());
        $user->save();

        return view('users.show', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->delete();
        $users = User::all();
        return view('users.user', ['users' => $users]);
    }

    public function profile() {
        $user = \Auth::user();
        if(!$user->hasRole('pharmacy')) {
            return view('people.show', ['person' => $user->person]);
        } else {
            return view('pharmacies.show', ['pharmacy' => $user->pharmacy]);
        }
    }

    public function editProfile() {
        $user = \Auth::user();
        if(!$user->hasRole('pharmacy')) {
            $person = $user->person;
            return view('people.edit', ['person' => $person]);
        } else {
            $pharmacy = $user->pharmacy;
            return view('pharmacies.edit', ['pharmacy' => $pharmacy]);
        }
    }
}
