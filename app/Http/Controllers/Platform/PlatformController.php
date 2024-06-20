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

      // //  Obtener todos los clientes
      // //   $plataformas = Platform::all();        
      // //   Formatear los clientes usando ClienteResource
      // //   $plataformasFormateados = PlatformResource::collection($plataformas);
      // //  Devolver los Platform formateados como una respuesta JSON
      // //   return response()->json($plataformasFormateados);
     }

     public function store(Request $request)
     {
         // Validar los datos de la solicitud
         $validatedData = $request->validate([
             'plataforma' => 'string', // Ejemplo de reglas de validación
             // Agrega aquí más reglas según sea necesario para otros campos
         ]);
     
         try {
             // Intentar crear la plataforma
             $plataforma = Platform::create($validatedData);
     
             // Comprobar si se creó correctamente
             if ($plataforma) {
                 // Retornar respuesta JSON en caso de éxito
                 return response()->json(['message' => 'Plataforma creada satisfactoriamente', 'status' => 200]);
             } else {
                 // Retornar una respuesta de error si no se pudo crear
                 return response()->json(['message' => 'Error al crear la plataforma', 'status' => 500]);
             }
         } catch (\Exception $e) {
             // Capturar cualquier excepción que pueda ocurrir durante la creación
             return response()->json(['message' => 'Error interno del servidor', 'status' => 500]);
         }
     }
     

}
