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


    // public function create()
    // {
    //     return Inertia::render('Admin/Clients/Create');
    // }

    public function store(Request $request)
    {
        $request->validate([           
            'fecha' => '|date',
            'dni' => 'string',
            'medio_de_contacto' => 'string',
            'medio_de_respuesta' => 'string',
            'como_llego_a_la_marca' => 'string',
            'tipo_negocio' => 'string',
            'estado' => 'string',
            'respuesta_asesor' => 'string',
            'primer_contacto' => 'string',
            'segundo_contacto' => 'string',
            'tercer_contacto' => 'string',
            'contacto' => 'string',
            'realizo_la_venta' => 'string|in:si,no',
            'futuro_socio' => 'string|in:si,no',
        ]);

       //$this->validateCustom($request);
      // dd($request->all()); 
       // Crear el cliente si pasa todas las validaciones
       $cliente = Cliente::create($request->all());
          

      if ($cliente) {
        $message = 'Cliente creado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
           'status' => 200
        ]);
          }else{
            $message = 'Cliente no fue creado satisfactoriamente';
    
            return response()->json([
                'message' => $message,
               'status' => 404
            ]);
          }
     
       // return redirect()->route('clients.index');
    }

    // public function edit(Cliente $cliente)
    // {
    //     return Inertia::render('Admin/Clients/Edit', [
    //         'cliente' => new ClienteResource($cliente)
    //     ]);
    // }

    public function update(Request $request, $id)
    {
        $request->validate([           
            'fecha' => 'date',
            'dni' => 'string',
            'medio_de_contacto' => 'string',
            'medio_de_respuesta' => 'string',
            'como_llego_a_la_marca' => 'string',
            'tipo_negocio' => 'string',
            'producto_o_servicio' => 'string',
            'estado' => 'string',
            'respuesta_asesor' => 'string',
            'primer_contacto' => 'string',
            'segundo_contacto' => 'string',
            'tercer_contacto' => 'string',
            'contacto' => 'string',
            'realizo_la_venta' => 'string',
            'futuro_socio' => 'string',
        ]);
    
        // Obtener el cliente por su ID
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            $message = 'Cliente no encontrado';
            return response()->json([
                'message' => $message,
                'status' => 404
            ]);
        }
    
        // Actualizar los datos del cliente
        $cliente->update($request->all());
    
        $message = 'Cliente actualizado satisfactoriamente';
    
        return response()->json([
            'message' => $message,
            'status' => 200
        ]);
    }
    

    // public function destroy(Cliente $cliente)
    // {
    //     $cliente->delete();

    //     return redirect()->route('clients.index');
    // }
    
    public function destroy($id)
{
    $cliente = Cliente::findOrFail($id);

    // Aquí podrías agregar la validación de autorización si es necesario

    try {
        $cliente->delete();
        return redirect()->route('clients.index')->with('success', 'Cliente eliminado correctamente.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Ha ocurrido un error al eliminar el cliente.');
    }
}

}
