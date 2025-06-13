<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Autos;


class Persona extends Model
{
    protected $fillable = ['nombre', 'apellido', 'fecha_nacimiento'];

    public function autos(): BelongsToMany
    {
    return $this->belongsToMany(Auto::class);
    }

}
