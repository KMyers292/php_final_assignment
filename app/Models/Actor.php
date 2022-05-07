<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Movie;


class Actor extends Model
{
    protected $table = 'actors';
    protected $fillable = ['name', 'image'];

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
}