<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranking extends Model
{
    use HasFactory;

    protected $table = 'ranking';

    protected $fillable = [
        'usuario_id',
        'total_points',
    ];


    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
