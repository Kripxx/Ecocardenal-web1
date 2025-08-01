<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Usuario extends Authenticatable
{
    use HasFactory, HasApiTokens;

  
    
   protected $table = 'usuario'; // Especifica el nombre de la tabla
    
    protected $fillable = [
        'nombreUsuario',
        'nombre',
        'apellido',
        'correo',
        'password'
    ];
    
    public $timestamps = true; // Asegúrate que esto esté true

    // Oculta el campo `password` cuando se convierte el modelo a JSON
    protected $hidden = [
        'password',
    ];

  
    
    public function ranking()
    {
        return $this->hasOne(Ranking::class, 'usuario_id');
    }
}