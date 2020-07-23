<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Sitio;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\SitioFormRequest;
use DB;
use Response;
use Illuminate\Support\Collection;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class SitioController extends Controller
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
   			$sitio=DB::table('sitio as sit')
            ->join('usuario as u','sit.id_usuario','=','u.id_usuario')
            ->select('sit.id_sitio','sit.id_usuario','sit.nombre_sitio','sit.departamento_sitio','sit.provincia_sitio','sit.localidad_sitio','sit.telefono_sitio')

            ->where('sit.nombre_sitio','LIKE','%'.$query.'%')
            ->orwhere('sit.departamento_sitio','LIKE','%'.$query.'%')
            ->orWhere('sit.provincia_sitio','LIKE','%'.$query.'%')
            ->orWhere('sit.localidad_sitio','LIKE','%'.$query.'%')
            ->orWhere('sit.id_usuario','LIKE','%'.$query.'%')
   			
   			->orderBy('id_sitio','asc')
   			->paginate(10);
   			return view('sidacta.sitio.index',["sitio"=>$sitio,"searchText"=>$query]);
   		}//
   } 
   public function create()
   {
         $usuario=DB::table('usuario')->get();
         $sitio=DB::table('sitio')->get();
         return view("sidacta.sitio.create",["sitio"=>$sitio,"usuario"=>$usuario]);


   }
   public function store(SitioFormRequest $request)
   {
   		$sitio=new Sitio;
         //$sitio->id_sitio=$request->get('id_sitio');
         $sitio->id_usuario=$request->get('id_usuario');
         $sitio->nombre_sitio=$request->get('nombre_sitio');
   		$sitio->departamento_sitio=$request->get('departamento_sitio');
   		$sitio->provincia_sitio=$request->get('provincia_sitio');
   		$sitio->localidad_sitio=$request->get('localidad_sitio');
   		$sitio->telefono_sitio=$request->get('telefono_sitio');
         

         $config=['table' => 'sitio','field'=>'id_sitio', 'length' => 12, 'prefix'=>'SITIO'];
         $id = IdGenerator::generate($config);
         $sitio->id_sitio=$id;
   
   		$sitio->save();
   		return Redirect::to('sidacta/sitio');
   }
   public function show($id)
   {
   		return view("sidacta.sitio.show",["sitio"=>Sitio::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
         $sitio=Sitio::findOrFail($id);
         $usuario=DB::table('usuario')->get();
         
      

   		return view("sidacta.sitio.edit",["sitio"=>$sitio, "usuario"=>$usuario]);
          //llama al form editdonde muestra los datos de un sitio especifico
   }
   public function update(SitioFormRequest $request,$id)
   {
   		$sitio=Sitio::findOrFail($id);
         
         $sitio->id_usuario=$request->get('id_usuario');
         $sitio->nombre_sitio=$request->get('nombre_sitio');
		   $sitio->departamento_sitio=$request->get('departamento_sitio');
   		$sitio->provincia_sitio=$request->get('provincia_sitio');
   		$sitio->localidad_sitio=$request->get('localidad_sitio');
   		$sitio->telefono_sitio=$request->get('telefono_sitio');
   		$sitio->update();
   		return Redirect::to('sidacta/sitio');
   }
   public function destroy($id)
   {
   		$sitio=Sitio::findOrFail($id);
   		$sitio->delete();
   		return Redirect::to('sidacta/sitio');
   }
}
