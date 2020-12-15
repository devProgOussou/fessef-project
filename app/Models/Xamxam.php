<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Xamxam extends Model
{
    use HasFactory;

    protected $fillable = [
        'nbreDeVus',
        'archive',
        'titre',
        'tags',
        'contenu',
        'image'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
