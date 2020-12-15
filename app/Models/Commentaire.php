<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'likes',
        'dislikes',
        'commentaires',
        'user_id'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function feusseul()
    {
        return $this->belongsTo(Feusseul::class);
    }
}
