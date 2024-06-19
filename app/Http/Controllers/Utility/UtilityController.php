<?php

namespace App\Http\Controllers\Utility;

use App\Http\Controllers\Controller;
use App\Http\Resources\UtilityResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Utility;

class UtilityController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Utilitys/Index', [
            'utilidades' => UtilityResource::collection(Utility::all())
        ]);  
        
    //    //Obtener todos los clientes
    //     $transacciones = Utility::all();        
    //     //Formatear los clientes usando ClienteResource
    //     $transaccionesFormateados = UtilityResource::collection($transacciones);
    //    // Devolver los clientes formateados como una respuesta JSON
    //     return response()->json($transaccionesFormateados);
     }
}
