<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Categoria;

class CategoriaController extends Controller
{

    public function select()
    {
        $categorias = Categoria::all();

        return response()->json([
            "ok"=>true,
            "data"=>$categorias
        ]);
    }

}
