<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Proveedor;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProveedorFormRequest;
use DB;
//use Response;
use Illuminate\Support\Collection; 
use Haruncpi\LaravelIdGenerator\IdGenerator;

class ProveedorController extends Controller
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
   			$proveedor=DB::table('proveedor')
            ->where('nombre_proveedor','LIKE','%'.$query.'%')
            ->orWhere('id_proveedor','LIKE','%'.$query.'%')
            ->orWhere('correo_electronico_proveedor','LIKE','%'.$query.'%')
            ->orWhere('telefono_proveedor','LIKE','%'.$query.'%')
   			
   			->orderBy('id_proveedor','desc')
   			->paginate(10);
   			return view('sidacta.proveedor.index',["proveedor"=>$proveedor,"searchText"=>$query]);
   		}//
   } 
   public function create()
   {
   		return view("sidacta.proveedor.create");
   }
   public function store(ProveedorFormRequest $request)
   {
   		$proveedor=new Proveedor;
   		$proveedor->id_proveedor=$request->get('id_proveedor');
   		$proveedor->nombre_proveedor=$request->get('nombre_proveedor');
   		$proveedor->direccion_proveedor=$request->get('direccion_proveedor');
   		$proveedor->telefono_proveedor=$request->get('telefono_proveedor');
   		$proveedor->correo_electronico_proveedor=$request->get('correo_electronico_proveedor');
         

   		$proveedor->save();
   		return Redirect::to('sidacta/proveedor');
   }
   public function show($id)
   {
   		return view("sidacta.proveedor.show",["proveedor"=>Proveedor::findOrFail($id)]); //llama al form show donde muestra los datos de un sitio especifico
   }
   public function edit($id)
   {
   		return view("sidacta.proveedor.edit",["proveedor"=>Proveedor::findOrFail($id)]); //llama al form editdonde muestra los datos de un sitio especifico
   }
   public function update(ProveedorFormRequest $request,$id)
   {
   		$proveedor=Proveedor::findOrFail($id);
   		$proveedor->id_proveedor=$request->get('id_proveedor');
   		$proveedor->nombre_proveedor=$request->get('nombre_proveedor');
   		$proveedor->direccion_proveedor=$request->get('direccion_proveedor');
   		$proveedor->telefono_proveedor=$request->get('telefono_proveedor');
   		$proveedor->correo_electronico_proveedor=$request->get('correo_electronico_proveedor');
   		$proveedor->update();
   		return Redirect::to('sidacta/proveedor');
   }
   public function destroy($id)
   {
   		$proveedor=Proveedor::findOrFail($id);
   		$proveedor->delete();
   		return Redirect::to('sidacta/proveedor');
   }
}
