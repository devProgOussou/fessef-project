<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feusseul extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'contenu',
        'file',
        'extension',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }

    public function likeDislike()
    {
        return $this->belongsTo(LikeDislike::class);
    }
}
