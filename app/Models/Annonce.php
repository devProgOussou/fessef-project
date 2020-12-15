<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre',
        'description',
        'image',
        'contenu',
        'nbreDeVus',
        'interet',
        'user_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function annonce()
    {
        return $this->belongsTo(Annonce::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function interesse()
    {
        return $this->belongsTo(Interesse::class);
    }
}
