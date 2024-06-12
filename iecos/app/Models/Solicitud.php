<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Solicitud extends Model
{
    protected $table = 'recyclable_items';
    protected $fillable = ["id", "quantity", "recycling_type_id", "created_at", "updated_at", "user_id", "cant_aprox", "descripcion", "estado"];
}
