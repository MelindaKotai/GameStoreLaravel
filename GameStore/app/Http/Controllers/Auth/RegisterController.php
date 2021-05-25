<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'nume' => ['required', 'string', 'max:255'],
            
            'prenume'=>['required', 'string'],
            'telefon'=>['required', 'digits:10'],
            'judet'=>['required', 'string'],
            'localitate'=>['required', 'string'],
            'adresa'=>['required', 'string'],
           
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'], 
             'password_confirmation' => ['required','same:password'],
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
        return User::create([
            'nume' => $data['nume'],
            'prenume'=>$data['prenume'],
            'telefon'=>$data['telefon'],
            'judet'=>$data['judet'],
            'localitate'=>$data['localitate'],
            'adresa'=>$data['adresa'],
            'email' => $data['email'],
            'rol'=>$data['rol'],
            'parola' => Hash::make($data['password']),
        ]);
    }
}
