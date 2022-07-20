<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'image',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function likedBy()
    {
        return $this->belongsToMany(User::class);
    }
}
