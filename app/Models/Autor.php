<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table = "autores";
    protected $primaryKey = "idAutor";
    public $timestamps = false;
    protected $fillable = ['nombre', 'biografia'];
}
