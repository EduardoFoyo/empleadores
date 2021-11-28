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
        'id_tema',
        'pregunta'
    ];

    public function area()
    {
        return $this->belongsTo('App\Models\Area', 'id_area')->all();
    }

    public function tema()
    {
        return $this->belongsTo('App\Models\Tema', 'id_tema');
    }
    
}