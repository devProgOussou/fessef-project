<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Association extends Model
{
    use HasFactory;

    protected $fillable = [
        'NomAssociation',
        'adresse',
        'telephone',
        'lien',
        'domaineActivites',
        'description',
        'dateDeCreation',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
