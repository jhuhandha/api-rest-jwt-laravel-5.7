<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Producto;

class ProductoController extends Controller
{
    //
    public function index(){

        $producto = Producto::all();

        return view("producto.index", compact("producto"));
    }

    public function crear(){
        return view("producto.crear");
    }

    public function guardar(Request $request){
        $datos = $request->all();
        
        Producto::create([
            "nombre"=> $datos["nombre"],
            "precio"=> $datos["precio"],
            "cantidad"=> $datos["cantidad"]
        ]);

        return redirect("/producto");
    }
}
