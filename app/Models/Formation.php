<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $fillable = [
    'titre_ar',
    'titre_fr',
    'description_ar',
    'description_fr'
];
}
