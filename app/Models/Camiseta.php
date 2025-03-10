<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Camiseta extends Model
{
    use HasFactory;

    protected $table = 'camiseta';

    protected $fillable = [
        'nombre',
        'precio',
        'descripcion'  
    ];
}
