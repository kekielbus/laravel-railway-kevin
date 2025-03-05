<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Camiseta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CamisetaController extends Controller
{
    public function index()
    {
        $camisetas = Camiseta::all()->map(function ($camiseta) {
            $camiseta->imagen = url($camiseta->imagen); // Agrega la URL completa
            return $camiseta;
        });
        return response()->json(Camiseta::all());
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required|max:255',  // Corregido: comillas faltantes
            'precio' => 'required',          // Corregido: comillas faltantes
            'descripcion' => 'required|max:255', // Corregido: comillas faltantes
        ]);
    
        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error en la validación de los datos',
                'errors' => $validator->errors(),
                'status' => 400
            ];
            return response()->json($data, 400);
        }
    
        $camiseta = Camiseta::create([
            'nombre' => $request->nombre,
            'precio' => $request->precio,
            'descripcion' => $request->descripcion,
        ]);
    
        if (!$camiseta) {
            $data = [
                'mensaje' => 'Error al crear la camiseta',
                'status' => 500
            ];
            return response()->json($data, 500);
        }
    
        $data = [
            'camiseta' => $camiseta,
            'status' => 201
        ];
        return response()->json($data, 201);
    }
    public function show($id)
    {
        $camiseta = Camiseta::find($id);

        if (!$camiseta) {
            $data = [
                'mensaje' => 'No se encontró la camiseta',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $data = [
            'camiseta' => $camiseta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function destroy($id)
    {
        $camiseta = Camiseta::find($id);
        if (!$camiseta) {
            $data = [
                'mensaje' => 'No se encontró la camiseta',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $camiseta->delete();
        $data = [
            'mensaje' => 'Camiseta eliminada',
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function update(Request $request, $id)
    {
        $camiseta = Camiseta::find($id);
        if (!$camiseta) {
            $data = [
                'mensaje' => 'No se encontró la camiseta',
                'status' => 404
            ];
            return response()->json($data, 404);
        }
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required'
        ]);
        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 422
            ];
            return response()->json($data, 422);
        }
        $camiseta->nombre = $request->nombre;
        $camiseta->precio = $request->precio;
        $camiseta->descripcion = $request->descripcion;
        $camiseta->save();
        $data = [
            'mensaje' => 'Camiseta actualizada',
            'camiseta' => $camiseta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
    public function updatePartial(Request $request, $id)
    {
        $camiseta = Camiseta::find($id);
        if (!$camiseta) {
            $data = [
                'mensaje' => 'No se encontró la camiseta',
                'status' => 404
            ];
            return response()->json($data, 404);
        }

        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'precio' => 'required',
            'descripcion' => 'required'
        ]);
        if ($validator->fails()) {
            $data = [
                'mensaje' => 'Error en la validación',
                'errors' => $validator->errors(),
                'status' => 422
            ];
            return response()->json($data, 422);
        }
        if ($request->has('nombre')) {
            $camiseta->nombre = $request->nombre;
        }
        if ($request->has('precio')) {
            $camiseta->precio = $request->precio;
        }
        if ($request->has('descripcion')) {
            $camiseta->descripcion = $request->descripcion;
        }
        $camiseta->save();

        $data = [
            'mensaje' => 'Camiseta actualizada',
            'camiseta' => $camiseta,
            'status' => 200
        ];
        return response()->json($data, 200);
    }
}
