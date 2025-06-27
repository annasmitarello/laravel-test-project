<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Personas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Auto extends Model
{ 
    /** @use HasFactory<\Database\Factories\AutoFactory> */
    use HasFactory;
    protected $fillable = [
    'color',
    'modelo',
    ];

      public function personas(): BelongsToMany
    {
        return $this->belongsToMany(Persona::class);
    }
}
