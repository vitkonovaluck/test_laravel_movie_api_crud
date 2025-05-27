<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{

    use HasFactory;
    protected $fillable = ['title', 'poster_path', 'is_published'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
