<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaEncuestado extends Model
{
    use HasFactory;
    protected $table = 'respuesta_encuestado';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    public $timestamps = false;
    public $incrementing = false;
    

    protected $fillable = [
        'id_encuestado',
        'id_respuesta'
    ];
}
