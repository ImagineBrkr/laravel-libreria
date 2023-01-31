<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $table = 'comentarios';
    protected $primaryKey = 'idComentario';
    public $timestamps = false;
    protected $fillable = ['idLibro', 'idComentario', 'apodo', 'comentario', 'nota'];
}
