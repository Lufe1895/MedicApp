<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Support\Str;
use App\Role;
use App\Pharmacy;
use App\Person;

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
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric', 'min:10'],
            'address' => ['required', 'string'],
        ], [
            'name.required' => 'El NOMBRE es obligatorio.',
            'name.max' => 'No puede contener más de 30 caracteres.',
            'email.required' => 'El CORREO es obligatorio.',
            'email.email' => 'Debe introducir un CORREO válido.',
            'email.unique' => 'Este CORREO ya ha sido registrado.',
            'password.required' => 'La CONTRASEÑA es obligatoria.',
            'password.min' => 'Debe contener al menos 8 caracteres.',
            'password.confirm' => 'Las CONTRASEÑAS no coinciden.',
            'phone.required' => 'El número de TELÉFONO es obligatorio.',
            'phone.numeric' => 'Tiene que ser un TELÉFONO válido.',
            'address.required' => 'La DIRECCIÓN es obligatoria.',
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
        if($data['role'] == 'user') {
            $user = User::create([
                'email' => $data['email'],
                'api_token' => Str::random(60),
                'password' => Hash::make($data['password'])
            ]);
    
            $person = Person::create([
                'name' => $data['name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'address' => $data['phone'],
                'sex' => $data['sex'],
                'age' => $data['age'],
                'user_id' => $user->id,
            ]);
    
            $user->person_id = $person->id;
            $user->save();

            $user->roles()->attach(Role::where('name', 'user')->first());

        } else {
            $user = User::create([
                'email' => $data['email'],
                'api_token' => Str::random(60),
                'password' => Hash::make($data['password'])
            ]);
    
            $pharmacy = Pharmacy::create([
                'name' => $data['name'],
                'phone' => $data['phone'],
                'address' => $data['phone'],
                'user_id' => $user->id,
            ]);
    
            $user->pharmacy_id = $pharmacy->id;
            $user->save();

            $user->roles()->attach(Role::where('name', 'pharmacy')->first());
        }

        return $user;
    }
}
