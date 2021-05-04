<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Str;
use App\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
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
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'api_token' => Str::random(60),
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'address' => $data['phone'],
            'sex' => $data['sex'],
            'age' => $data['age'],
        ]);

        $user->roles()->attach(Role::where('name', $data['role'])->first());

        return $user;
    }
}
