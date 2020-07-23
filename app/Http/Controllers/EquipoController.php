<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Equipo; 
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\EquipoFormRequest;
use DB;
use Response;
use Illuminate\Support\Collection;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class EquipoController extends Controller
{
   public function __construct()
   {
      $this->middleware('auth');
   }
   public function index(Request $request)
   {
   		if ($request)
   		{
   			$query=trim($request->get('searchText'));
            $equipo=DB::table('equipo as e')
            ->join('sitio as s','e.id_sitio','=','s.id_sitio')
            ->join('almacen as a','e.id_almacen','=','a.id_almacen')
            ->join('proveedor as p','e.id_proveedor','=','p.id_proveedor')
            
            ->select('s.nombre_sitio as sitio',
            	     'a.descripcion_almacen as almacen',
            	     'p.nombre_proveedor as proveedor',
            	     'e.id_equipo',
            	     'e.nombre_equipo',
            	     'e.descripcion_equipo',
            	     'e.marca_equipo',
            	     'e.pais_origen_equipo', 
            	     'e.modelo_equipo',
            	     'e.numero_serie_equipo',
            	     'e.numero_parte_equipo',
            	     'e.estado_equipo',
            	     'e.precio_referencial_equipo',
            	     'e.observaciones_equipo',
                   'e.tipo_funcionamiento_equipo',
                   'e.cantidad_equipo',
                   'e.unidad_medida_equipo',
            	     )

            ->where('e.nombre_equipo','LIKE','%'.$query.'%')
            ->orwhere('s.nombre_sitio','LIKE','%'.$query.'%')
            ->orwhere('a.descripcion_almacen','LIKE','%'.$query.'%')
            ->orwhere('p.nombre_proveedor','LIKE','%'.$query.'%')
            ->orwhere('e.numero_serie_equipo','LIKE','%'.$query.'%')           
            ->orderBy('e.id_equipo','asc')
            ->orderBy('id_equipo','asc')
            ->paginate(10);
            return view('sidacta.equipo.index',["equipo"=>$equipo,"searchText"=>$query]);
   		}//
   } 
   public function create()
   {
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $proveedor=DB::table('proveedor')->get();
         return view("sidacta.equipo.create",["sitio"=>$sitio, "almacen"=>$almacen, "proveedor"=>$proveedor]);
   }
   public function store(EquipoFormRequest $request)
   {
   		$equipo=new Equipo;
        
        $equipo->id_sitio=$request->get('id_sitio');
        $equipo->id_almacen=$request->get('id_almacen');
        $equipo->id_proveedor=$request->get('id_proveedor');
        $equipo->nombre_equipo=$request->get('nombre_equipo');
        $equipo->descripcion_equipo=$request->get('descripcion_equipo');
        $equipo->marca_equipo=$request->get('marca_equipo');
        $equipo->pais_origen_equipo=$request->get('pais_origen_equipo');
        $equipo->modelo_equipo=$request->get('modelo_equipo');
        $equipo->numero_serie_equipo=$request->get('numero_serie_equipo');
        $equipo->numero_parte_equipo=$request->get('numero_parte_equipo');
        $equipo->estado_equipo=$request->get('estado_equipo');
        $equipo->precio_referencial_equipo=$request->get('precio_referencial_equipo');
        $equipo->observaciones_equipo=$request->get('observaciones_equipo');
        $equipo->tipo_funcionamiento_equipo=$request->get('tipo_funcionamiento_equipo');
        $equipo->cantidad_equipo=$request->get('cantidad_equipo');
        $equipo->unidad_medida_equipo=$request->get('unidad_medida_equipo');
                   
        $config=['table' => 'equipo','field'=>'id_equipo', 'length' => 12, 'prefix'=>'EQUIP'];
        $id = IdGenerator::generate($config);
        $equipo->id_equipo=$id;

       

   		$equipo->save();

   		return Redirect::to('sidacta/equipo');
   }
   public function show($id)
   {
   		//return view("sidacta.almacen.show",["almacen"=>Almacen::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
         $equipo=Equipo::findOrFail($id);
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $proveedor=DB::table('proveedor')->get();
      

   		return view("sidacta.equipo.edit",["equipo"=>$equipo, "sitio"=>$sitio, "almacen"=>$almacen, "proveedor"=>$proveedor]);
          //llama al form editdonde muestra los datos de un sitio especifico
   }
   public function update(EquipoFormRequest $request,$id)
   {
   		$equipo=Equipo::findOrFail($id);
        $equipo->id_sitio=$request->get('id_sitio');
        $equipo->id_almacen=$request->get('id_almacen');
        $equipo->id_proveedor=$request->get('id_proveedor');
        $equipo->nombre_equipo=$request->get('nombre_equipo');
        $equipo->descripcion_equipo=$request->get('descripcion_equipo');
        $equipo->marca_equipo=$request->get('marca_equipo');
        $equipo->pais_origen_equipo=$request->get('pais_origen_equipo');
        $equipo->modelo_equipo=$request->get('modelo_equipo');
        $equipo->numero_serie_equipo=$request->get('numero_serie_equipo');
        $equipo->numero_parte_equipo=$request->get('numero_parte_equipo');
        $equipo->estado_equipo=$request->get('estado_equipo');
        $equipo->precio_referencial_equipo=$request->get('precio_referencial_equipo');
        $equipo->observaciones_equipo=$request->get('observaciones_equipo');
        $equipo->tipo_funcionamiento_equipo=$request->get('tipo_funcionamiento_equipo');
        $equipo->cantidad_equipo=$request->get('cantidad_equipo');
        $equipo->unidad_medida_equipo=$request->get('unidad_medida_equipo');

   		$equipo->update();
   		return Redirect::to('sidacta/equipo');
   }
   public function destroy($id)
   {
   		$equipo=Equipo::findOrFail($id);
   		$equipo->delete();
   		return Redirect::to('sidacta/equipo');
   }
   public function form()
    {
        
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $proveedor=DB::table('proveedor')->get();
      
        return view("sidacta.form", [ "sitio"=>$sitio, "almacen"=>$almacen, "proveedor"=>$proveedor]);
    }
}
