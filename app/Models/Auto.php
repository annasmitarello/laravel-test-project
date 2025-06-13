<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Personas;
class Auto extends Model
{
    protected $fillable = [
    'patente',
    'color',
    'modelo',
];

      public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
