<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    protected $table = "compras";
    protected $primaryKey = 'idCompra';
    public $timestamps = false;
    protected $fillable = ['idUsuario', 'idLibro', 'fechaCompra'];
}
