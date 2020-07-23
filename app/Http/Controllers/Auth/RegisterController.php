<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
use App\aut\RegistersUsers;
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
    //protected $redirectTo = RouteServiceProvider::HOME;
    //protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

        $this->middleware('auth');
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
            'id_usuario'=>['required', 'max:20'],
            'nombre_usuario'=>['required','max:50'],
            'apellido_paterno_usuario'=>['required','max:60'],
            'apellido_materno_usuario'=>['required','max:60'],
            'celular_usuario'=>['min:8'],
            'direccion_usuario'=>['required','max:120'],
            'correo_electronico_usuario'=>['required','max:60'],
            'grado_instruccion_usuario'=>['required','max:50'],
            'estado_usuario'=>['required','max:20'],
            'tipo_usuario'=>['required','max:20'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return Usuario::create([
            'id_usuario' => $data['id_usuario'],
            'nombre_usuario' => $data['nombre_usuario'],
            'apellido_paterno_usuario' => $data['apellido_paterno_usuario'],
            'apellido_materno_usuario' => $data['apellido_materno_usuario'],
            'celular_usuario' => $data['celular_usuario'],
            'direccion_usuario' => $data['direccion_usuario'],
            'correo_electronico_usuario' => $data['correo_electronico_usuario'],
            'grado_instruccion_usuario' => $data['grado_instruccion_usuario'],
            'estado_usuario' => $data['estado_usuario'],
            'tipo_usuario' => $data['tipo_usuario'],
            'password' => Hash::make($data['password']),
          

        ]);
    }
}
