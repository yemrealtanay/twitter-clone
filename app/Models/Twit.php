<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Twit extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
    ];

    protected $guarded = [
        'id',
    ];

    public function parent()
    {
        return $this->belongsTo(Twit::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Twit::class, 'parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
