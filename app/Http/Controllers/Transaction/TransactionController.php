<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Http\Resources\TransactionResource; // Import PersonResource
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        return Inertia::render('Admin/Transactions/Index', [
            'transacciones' => TransactionResource::collection(Transaction::all())
        ]);  
        
    //    //Obtener todos los clientes
    //     $transacciones = Transaction::all();        
    //     //Formatear los clientes usando ClienteResource
    //     $transaccionesFormateados = TransactionResource::collection($transacciones);
    //    // Devolver los clientes formateados como una respuesta JSON
    //     return response()->json($transaccionesFormateados);
     }
}
