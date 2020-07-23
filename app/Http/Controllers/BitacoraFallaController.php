<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests; 
use App\BitacoraFalla; 
use App\Equipo; 
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\BitacoraFallaRequest;
use DB;
use Response;
use Illuminate\Support\Collection;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class BitacoraFallaController extends Controller
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
            $bitacora=DB::table('bitacora_falla as b')
            ->join('equipo as e','b.id_equipo','=','e.id_equipo')
            ->join('usuario as u','b.id_usuario','=','u.id_usuario')
            ->join('sitio as s','b.id_sitio','=','s.id_sitio')
            ->join('almacen as a','b.id_almacen','=','a.id_almacen')
            
            ->select('b.id_bitacora_falla',
            	     's.nombre_sitio as sitio',
            	     'a.descripcion_almacen as almacen',
            	     'e.nombre_equipo as equipo',
            	     'u.nombre_usuario as nombre',
            	     'u.apellido_paterno_usuario as apellido1',
            	     'u.apellido_materno_usuario as apellido2',
            	     'b.descripcion_falla',
            	     'b.estado_falla',	    
            	     )

            ->where('e.nombre_equipo','LIKE','%'.$query.'%')
            ->orwhere('s.nombre_sitio','LIKE','%'.$query.'%')
            ->orwhere('a.descripcion_almacen','LIKE','%'.$query.'%')

            ->orderBy('id_bitacora_falla','asc')
            ->paginate(10);
            return view('sidacta.bitacora_falla.index',["bitacora"=>$bitacora,"searchText"=>$query]);
   		}//
   } 
   public function create($inputs, $sit)
   {
         $in=Equipo::findOrFail($inputs);
         $equipo=$in;
         $sitio=$sit;
         /*$sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $usuario=DB::table('usuario')->get();*/
         return view("sidacta.bitacora_falla.create",[ 
                                "sitio"=>$sitio,
         												//"almacen"=>$almacen, 
         												"equipo"=>$equipo,
                                ]);
   }
   public function store(BitacoraFallaRequest $request)
   {
        $bitacora=new BitacoraFalla;        
        $bitacora->id_sitio=$request->get('id_sitio');
        $bitacora->id_almacen=$request->get('id_almacen');
        $bitacora->id_equipo=$request->get('id_equipo');
        $bitacora->id_usuario=$request->get('id_usuario');
        $bitacora->descripcion_falla=$request->get('descripcion_falla');
        $bitacora->estado_falla=$request->get('estado_falla');                   
        $config=['table' => 'bitacora_falla','field'=>'id_bitacora_falla', 'length' => 12, 'prefix'=>'FALLA'];
        $id = IdGenerator::generate($config);
        $bitacora->id_bitacora_falla=$id;
        $bitacora->save();

        return Redirect::to('sidacta/bitacora_falla');
   }
   public function show($id)
   {
   		//return view("sidacta.almacen.show",["almacen"=>Almacen::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
         $bitacora=BitacoraFalla::findOrFail($id);
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $usuario=DB::table('usuario')->get();
         $equipo=DB::table('equipo')->get();
      
   		   return view("sidacta.bitacora_falla.edit",[
                              "equipo"=>$equipo, 
                              "sitio"=>$sitio, 
                              "almacen"=>$almacen, 
                              "bitacora"=>$bitacora, 
                              "usuario"=>$usuario]);
         //llama al form edit donde muestra los datos de un sitio especifico
   }
   public function update(BitacoraFallaRequest $request,$id)
   {
   		  $bitacora=BitacoraFalla::findOrFail($id);
        $bitacora->id_sitio=$request->get('id_sitio');
        $bitacora->id_almacen=$request->get('id_almacen');
        $bitacora->id_equipo=$request->get('id_equipo');
        $bitacora->id_usuario=$request->get('id_usuario');
        $bitacora->descripcion_falla=$request->get('descripcion_falla');
        $bitacora->estado_falla=$request->get('estado_falla');
   	    $bitacora->update();
   	    return Redirect::to('sidacta/bitacora_falla');
   }
   public function destroy($id)
   {
   		$bitacora=BitacoraFalla::findOrFail($id);
   		$bitacora->delete();
   		return Redirect::to('sidacta/bitacora_falla');
   }
   /* public function falla($id)
   {
         $equipo=Equipo::findOrFail($id);
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $usuario=DB::table('usuario')->get();
         return view("sidacta.bitacora_falla.create",[ "sitio"=>$sitio,
                                "almacen"=>$almacen, 
                                "equipo"=>$equipo,
                                "usuario"=>$usuario]);*/
   public function bitacora()
    {
         $sitio=DB::table('sitio')->get();
         $almacen=DB::table('almacen')->get();
         $proveedor=DB::table('proveedor')->get(); 
         return view("sidacta.form", [ "sitio"=>$sitio, "almacen"=>$almacen, "proveedor"=>$proveedor]);
    }
}


