<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Actor;


class Movie extends Model
{
    protected $table = 'movies';

    protected $fillable = ['title', 'image', 'release', 'rating'];

    public function actors()
    {
        return $this->hasMany(Actor::class);
    }
}