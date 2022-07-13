<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use softDeletes;
    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function actors(){
        return $this->belongsToMany(Actor::class);
    }

    protected $fillable = [
        'title',
        'year',
        'release',
        'runtime',
        'director',
        'imdb_votes'
    ];
}
