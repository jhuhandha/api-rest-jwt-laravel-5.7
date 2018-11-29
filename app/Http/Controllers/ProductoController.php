<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Producto;
use Validator;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::select("producto.*", "categoria.nombre as nombre_categoria")
            ->join("categoria", "producto.categoria_id", "=", "categoria.id")
            ->get();

        return response()->json([
            "ok" => true,
            "data" => $productos,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required|unique:producto|max:60',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'cantidad' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }

        try {
            Producto::create($input);

            return response()->json([
                "ok" => true,
                "mensaje" => "Se registro con exito",
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productos = Producto::select("producto.*", "categoria.nombre as nombre_categoria")
            ->join("categoria", "producto.categoria_id", "=", "categoria.id")
            ->where("producto.id", $id)
            ->first();

        return response()->json([
            "ok" => true,
            "data" => $productos,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'nombre' => 'required|max:60',
            'precio' => 'required|numeric',
            'categoria_id' => 'required|numeric',
            'cantidad' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'error' => $validator->messages(),
            ]);
        }

        try {
            $producto = Producto::find($id);

            if ($producto == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "No se encontro",
                ]);
            }

            $producto->update($input);

            return response()->json([
                "ok" => true,
                "mensaje" => "Se modifico con exito",
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $producto = Producto::find($id);

            if ($producto == false) {
                return response()->json([
                    "ok" => false,
                    "error" => "No se encontro",
                ]);
            }

            $producto->update([
                'estado' => $producto->estado == 1 ? 0 : 1,
            ]);

            return response()->json([
                "ok" => true,
                "mensaje" => "Se modifico con exito",
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                "ok" => false,
                "error" => $ex->getMessage(),
            ]);
        }
    }
}
