<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Auto extends Model
{
    protected $fillable = [
    'patente',
    'color',
    'modelo',
];

    public function tags(): MorphToMany
    {
    return $this->morphToMany(Tag::class, 'taggable');
    }
}
