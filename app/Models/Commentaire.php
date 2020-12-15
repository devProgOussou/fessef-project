<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $fillable = [
        'commentaires',
        'feusseul_id',
        'user_id',
        'like',
        'dislike'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function feusseul()
    {
        return $this->belongsTo(Feusseul::class);
    }
}
