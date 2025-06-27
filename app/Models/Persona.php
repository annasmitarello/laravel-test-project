<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Autos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Database\Factories\PersonaFactory;


class Persona extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento'];

    public function autos(): BelongsToMany
    {
    return $this->belongsToMany(Auto::class);
    }

}
