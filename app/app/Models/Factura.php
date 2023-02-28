<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $hidden=['created_at','updated_at'];
    protected $fillable = ['pedido', 'producto', 'unidades', 'precio_base', 'total'];

}
