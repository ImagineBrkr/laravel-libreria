<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deseado extends Model
{
    use HasFactory;
    protected $table = "deseados";
    protected $primaryKey = "idDeseado";
    public $timestamps = false;
    protected $fillable = ['idUsuario', 'idLibro', 'fechaAgregado'];
}
