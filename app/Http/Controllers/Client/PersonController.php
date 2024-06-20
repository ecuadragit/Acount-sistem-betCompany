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
