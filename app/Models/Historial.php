<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    protected $table = 'historial';

    protected $fillable = [
        'libro_id',
        'accion',
        'descripcion',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
}
