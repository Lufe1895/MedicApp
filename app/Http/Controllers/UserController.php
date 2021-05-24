<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;
use App\Person;
use App\Role;

class UserController extends Controller
{
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
            'email' => $request['email'],
            'api_token' => Str::random(60),
            'password' => Hash::make($request['password'])
        ]);

        $person = Person::create([
            'name' => $request['name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'address' => $request['phone'],
            'sex' => $request['sex'],
            'age' => $request['age']
        ]);

        $user->person_id = $person->id;
        $user->save();

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
