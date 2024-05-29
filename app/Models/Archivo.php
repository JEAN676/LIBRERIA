<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'libro_id',
        'imagen_path',
        'pdf_path',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }
    
}
