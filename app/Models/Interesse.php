<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interesse extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'post_id',
        'annonce_id',
        'annonce_image',
        'annonce_titre',
        'user_email',
        'user_name',
        'avatar',
        'CV',
        'LM'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }
}
