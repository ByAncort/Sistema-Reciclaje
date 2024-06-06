<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Solicitud extends Model
{
    protected $table = 'solicitudes_reciclaje';
    protected $fillable = ['ubicacion', 'usuario', 'estado'];
}
