<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\PersonResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Person;

class PersonController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Persons/Index', [
            'personas' => PersonResource::collection(Person::all())
        ]);  
        
    // //    Obtener todos los clientes
    // //     $personas = Person::all();
        
    // //     Formatear los clientes usando ClienteResource
    // //     $personasFormateados = PersonResource::collection($personas);

    // //     Devolver los clientes formateados como una respuesta JSON
    // //     return response()->json($personasFormateados);
    }
}
