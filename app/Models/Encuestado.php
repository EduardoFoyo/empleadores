<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encuestado extends Model
{
    use HasFactory;
    protected $table = 'encuestado';
    protected $primaryKey = 'id';
    protected $connection = 'mysql';
    public $timestamps = false;
    public $incrementing = false;
    

    protected $fillable = [
        'nombre',
        'empresa'
    ];
}
