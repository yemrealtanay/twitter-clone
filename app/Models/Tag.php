<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function twits()
    {
        return $this->belongsToMany(Twit::class);
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
}
