<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use App\Http\Resources\StoreResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Local;

class StoreController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Stores/Index', [
            'locales' => StoreResource::collection(Local::all())
        ]);  
        
    //    //Obtener todos los clientes
    //     $locales = Local::all();        
    //     //Formatear los clientes usando ClienteResource
    //     $localesFormateados = StoreResource::collection($locales);
    //    // Devolver los clientes formateados como una respuesta JSON
    //     return response()->json($localesFormateados);
     }
}
