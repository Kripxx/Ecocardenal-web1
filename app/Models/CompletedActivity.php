<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompletedActivity extends Model
{
    use HasFactory;

    protected $table = 'completed_activities';

    protected $fillable = [
        'usuario_id',
        'activity_type',
        'activity_name',
        'points',
        'completed_at',
    ];

    public $timestamps = false;  // Si no usas los timestamps automáticos
}
