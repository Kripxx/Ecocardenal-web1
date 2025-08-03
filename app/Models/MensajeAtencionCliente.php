<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MensajeAtencionCliente extends Model
{
    use HasFactory;
    protected $table = 'mensajes_atencion_clientes';
    protected $fillable = ['motivo', 'mensaje'];
}