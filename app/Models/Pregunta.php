<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;
    protected $table = 'pregunta';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    public $timestamps = false;
    public $incrementing = false;
    

    protected $fillable = [
        'id_area',
        'pregunta'
    ];
}
