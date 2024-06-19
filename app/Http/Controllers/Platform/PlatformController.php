<?php

namespace App\Http\Controllers\Platform;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlatformResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Platforms/Index', [
            'plataformas' => PlatformResource::collection(Platform::all())
        ]);          
    //    //Obtener todos los clientes
    //     $plataformas = Platform::all();        
    //     //Formatear los clientes usando ClienteResource
    //     $plataformasFormateados = PlatformResource::collection($plataformas);
    //    // Devolver los clientes formateados como una respuesta JSON
    //     return response()->json($plataformasFormateados);
     }
}
