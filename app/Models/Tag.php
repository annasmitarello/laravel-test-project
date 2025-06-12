<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphedByMany;


class Tag extends Model
{
    protected $fillable = ['nombre'];

    public function personas(): MorphedByMany
    {
        return $this->morphedByMany(Persona::class, 'taggable');
    }

    public function autos(): MorphedByMany
    {
        return $this->morphedByMany(Auto::class, 'taggable');
    }
}
