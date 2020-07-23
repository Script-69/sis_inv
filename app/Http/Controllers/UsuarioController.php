<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Usuario;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UsuarioFormRequest;
use DB;
use Illuminate\Support\Facades\Hash;
//use Response;
use Illuminate\Support\Collection;

class UsuarioController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function index(Request $request)
   {
   		if ($request)
   		{
   			$query=trim($request->get('searchText'));//variable query para el texto de busqueda
   			$usuario=DB::table('usuario')
            ->where('nombre_usuario','LIKE','%'.$query.'%')
            ->orWhere('apellido_paterno_usuario','LIKE','%'.$query.'%')
            ->orWhere('apellido_materno_usuario','LIKE','%'.$query.'%')
            ->orWhere('id_usuario','LIKE','%'.$query.'%')
   			
   			->orderBy('apellido_paterno_usuario','desc')
   			->paginate(10);
   			return view('sidacta.usuario.index',["usuario"=>$usuario,"searchText"=>$query]);
   		}//
   } 
   public function create()
   {
   		return view("sidacta.usuario.create");
   }
   public function store(UsuarioFormRequest $request)
   {
   		$usuario=new Usuario;
   		$usuario->id_usuario=$request->get('id_usuario');
   		$usuario->nombre_usuario=$request->get('nombre_usuario');
   		$usuario->apellido_paterno_usuario=$request->get('apellido_paterno_usuario');
   		$usuario->apellido_materno_usuario=$request->get('apellido_materno_usuario');
   		$usuario->celular_usuario=$request->get('celular_usuario');
   		$usuario->direccion_usuario=$request->get('direccion_usuario');
   		$usuario->correo_electronico_usuario=$request->get('correo_electronico_usuario');
   		$usuario->grado_instruccion_usuario=$request->get('grado_instruccion_usuario');
   		$usuario->estado_usuario=$request->get('estado_usuario');
   		$usuario->tipo_usuario=$request->get('tipo_usuario');
         $usuario->password= Hash::make($request['id_usuario']);
   
   		$usuario->save();
   		return Redirect::to('sidacta/usuario');
   }
   public function show($id) 
   {
   		return view("sidacta.usuario.show",["usuario"=>Usuario::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
   		return view("sidacta.usuario.edit",["usuario"=>Usuario::findOrFail($id)]); //llama al form editdonde muestra los datos de un sitio especifico
   }
   public function update(UsuarioFormRequest $request,$id)
   {
   		$usuario=Usuario::findOrFail($id);
   		$usuario->id_usuario=$request->get('id_usuario');
   		$usuario->nombre_usuario=$request->get('nombre_usuario');
   		$usuario->apellido_paterno_usuario=$request->get('apellido_paterno_usuario');
   		$usuario->apellido_materno_usuario=$request->get('apellido_materno_usuario');
   		$usuario->celular_usuario=$request->get('celular_usuario');
   		$usuario->direccion_usuario=$request->get('direccion_usuario');
   		$usuario->correo_electronico_usuario=$request->get('correo_electronico_usuario');
   		$usuario->grado_instruccion_usuario=$request->get('grado_instruccion_usuario');
   		$usuario->estado_usuario=$request->get('estado_usuario');
   		$usuario->tipo_usuario=$request->get('tipo_usuario');
         $usuario->password= Hash::make($request['password']);
         //$usuario->password=$request->get('password') => Hash::make($request['password']);

   		$usuario->update();
   		return Redirect::to('sidacta/usuario');
   }
   public function destroy($id)
   {
   		$usuario=Usuario::findOrFail($id);
   		$usuario->delete();
   		return Redirect::to('sidacta/usuario');
   }
}
