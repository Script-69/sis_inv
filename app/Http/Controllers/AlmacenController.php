<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Almacen; 
use App\Equipo; 
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\AlmacenFormRequest;
use DB;
use Response;
use Illuminate\Support\Collection;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AlmacenController extends Controller
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
           

         
        /* $total=Almacen::findOrFail($id);
         $total->cantidad_equipo_almacen=$suma;
         $total->update();*/
         

   			$almacen=DB::table('almacen as almc')
            ->join('sitio as sit','almc.id_sitio','=','sit.id_sitio')
            //->join('equipo as eq', 'almc.id_almacen', '=', 'eq.id_almacen')
            
            ->select ('almc.id_almacen', 'sit.nombre_sitio as sitio','almc.descripcion_almacen','almc.estado_almacen','almc.cantidad_equipo_almacen')

            ->where('almc.id_almacen','LIKE','%'.$query.'%')
            //->orwhere('eq.id_almacen','=','almc.id_almacen')
            ->orWhere('almc.descripcion_almacen','LIKE','%'.$query.'%')
            ->orWhere('almc.estado_almacen','LIKE','%'.$query.'%')
            //->sum('eq.cantidad_equipo')
   			->orderBy('id_almacen','asc')
         /*
            $suma = DB::table('equipo')
            ->join('almacen', 'equipo.id_almacen', '=', 'almacen.id_almacen')
            ->where('equipo.id_almacen','=','almacen.id_almacen')
            ->sum('equipo.cantidad_equipo');*/
   			->paginate(10);
            //print_r($suma);*/

   return view('sidacta.almacen.index',["almacen"=>$almacen,"searchText"=>$query]);
   		}//
   } 
   public function create()
   {
         $sitio=DB::table('sitio')->get();
         return view("sidacta.almacen.create",["sitio"=>$sitio]);
   }
   public function store(AlmacenFormRequest $request)
   {
   		$almacen=new Almacen;
         
         $almacen->descripcion_almacen=$request->get('descripcion_almacen');
         $almacen->id_sitio=$request->get('id_sitio');
   		$almacen->cantidad_equipo_almacen=$request->get('cantidad_equipo_almacen');


   		$almacen->estado_almacen=$request->get('estado_almacen');
         $config=['table'=>'almacen','field'=>'id_almacen','length'=>12,'prefix'=>'ALMCN'];
         $id = IdGenerator::generate($config);
         $almacen->id_almacen=$id;

   		$almacen->save();
   		return Redirect::to('sidacta/almacen');
   }
   public function show($id)
   {
   		//return view("sidacta.almacen.show",["almacen"=>Almacen::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
         
         $almacen=Almacen::findOrFail($id);
         $sitio=DB::table('sitio')->get();
   		return view("sidacta.almacen.edit",["almacen"=>$almacen, "sitio"=>$sitio]);
          //llama al form editdonde muestra los datos de un sitio especifico
   }
   public function update(AlmacenFormRequest $request,$id)
   {
   		$almacen=Almacen::findOrFail($id);
         $almacen->id_sitio=$request->get('id_sitio');
         $almacen->descripcion_almacen=$request->get('descripcion_almacen');
   		$almacen->cantidad_equipo_almacen=$request->get('cantidad_equipo_almacen');
   		$almacen->estado_almacen=$request->get('estado_almacen');
   		$almacen->update();
   		return Redirect::to('sidacta/almacen');
   }
   public function destroy($id)
   {
   		$almacen=Almacen::findOrFail($id);
   		$almacen->delete();
   		return Redirect::to('sidacta/almacen');
   }
} 
