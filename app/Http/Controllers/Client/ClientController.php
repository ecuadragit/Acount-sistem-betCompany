<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClienteResource; // Importar el recurso ClienteResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Cliente;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function index() {

        return Inertia::render('Admin/Clients/Index', [
            'clientes' => ClienteResource::collection(Cliente::all())
        ]);

        // // Obtener todos los clientes
        // $clientes = Cliente::all();
        
        // // Formatear los clientes usando ClienteResource
        // $clientesFormateados = ClienteResource::collection($clientes);

        // // Devolver los clientes formateados como una respuesta JSON
        // return response()->json($clientesFormateados);
    }
}
