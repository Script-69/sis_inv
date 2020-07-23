<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use PDF;
use App\Equipo; 
use Illuminate\Support\Facades\Redirect;
use DB;
use Response;
use Illuminate\Support\Collection;

class ReporteController extends Controller
{
    public function form()
    {
        return view('sidacta.equipo.form');
    }
    public function PDF()  
    {
    	$pdf = PDF::loadview('sidacta.prueba');

    	return $pdf->setPaper('a4', 'landscape')->stream('prueba.pdf');
    }
    public function PDFEquipos(Request $request)
    {
        $query=trim($request->get('sitio'));
        $query2=trim($request->get('almacen'));
        $equipos=DB::table('equipo as e')
            ->join('sitio as s','e.id_sitio','=','s.id_sitio')
            ->join('almacen as a','e.id_almacen','=','a.id_almacen')
            ->join('proveedor as p','e.id_proveedor','=','p.id_proveedor')
            
            ->select(
                     'e.id_equipo',
                     's.nombre_sitio as sitio',
                     'a.descripcion_almacen as almacen',
                     'p.nombre_proveedor as proveedor',
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
                     )
            ->where('s.nombre_sitio','LIKE','%'.$query.'%')
            ->where('a.descripcion_almacen','LIKE','%'.$query2.'%')
            ->orwhere('e.nombre_equipo','LIKE','%'.$query.'%')
            ->orwhere('p.nombre_proveedor','LIKE','%'.$query.'%')
            ->orwhere('e.numero_serie_equipo','LIKE','%'.$query.'%')  
            
            ->get();

    	$pdf = PDF::loadview('equipos', compact('equipos'));
    	return $pdf->setPaper('a4', 'landscape')->stream('equi.pdf');
        //return view('sidacta.equipo.index',["equipo"=>$equipo,"searchText"=>$query]);
        
        
    }

    /*   public function index(Request $request)
        public function getForm()
    {
        return view('my.form');
    }

    public function postForm(Request $request)
    {
        // do something with the form data in $request
    }
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
        }*/
}
