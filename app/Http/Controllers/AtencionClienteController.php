<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\MensajeAtencionCliente;
use Exception;

class AtencionClienteController extends Controller
{
    public function index()
    {
        return view('atencionCliente.index');
    }

    public function enviar(Request $request)
{
    try {
        $request->validate([
            'motivo' => 'required|string',
            'mensaje' => 'required|string|min:10',
        ]);

        $mensaje = MensajeAtencionCliente::create([
            'motivo' => $request->motivo,
            'mensaje' => $request->mensaje,
        ]);

        Log::info('✅ Mensaje guardado correctamente:', $mensaje->toArray());

        return redirect()->route('atencion.cliente')->with('success', 'Tu mensaje fue enviado. ¡Gracias por contactarnos!');

    } catch (Exception $e) {
        Log::error('❌ Error al guardar mensaje:', [
            'error' => $e->getMessage(),
            'request' => $request->all()
        ]);

        return redirect()->route('atencion.cliente')->with('error', 'Ocurrió un error al enviar el mensaje.');
    }
}

}