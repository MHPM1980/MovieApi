<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use softDeletes;
    public function movies(){
        return $this->belongsToMany(Movie::class);
    }

    protected $fillable = [
        'description',
    ];

    protected static function booted()
    {
        static::deleting(function ($genre) {
            if ($genre->movies()->exists()) {
                throw new \Exception('Related movies found');
            }
        });
    }
}
