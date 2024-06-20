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

        // Obtener todos los clientes
        $clientes = Cliente::all();
        
        // Formatear los clientes usando ClienteResource
        $clientesFormateados = ClienteResource::collection($clientes);

        // Devolver los clientes formateados como una respuesta JSON
        return response()->json($clientesFormateados);
    }


    // public function create()
    // {
    //     return Inertia::render('Admin/Clients/Create');
    // }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            // Agrega más validaciones según tus necesidades
        ]);

        $cliente = Cliente::create($request->all());

        return redirect()->route('clients.index');
    }

    public function edit(Cliente $cliente)
    {
        return Inertia::render('Admin/Clients/Edit', [
            'cliente' => new ClienteResource($cliente)
        ]);
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            // Agrega más validaciones según tus necesidades
        ]);

        $cliente->update($request->all());

        return redirect()->route('clients.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clients.index');
    }
}
