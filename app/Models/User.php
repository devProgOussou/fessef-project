<?php

namespace App\Models;

use App\Models\Xamxam;
use App\Models\Annonce;
use App\Models\Message;
use App\Models\Etudiant;
use App\Models\Feusseul;
use App\Models\Entreprise;
use App\Models\Association;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'isEtudiant',
        'isCompany',
        'isAssociation',
        'isState'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function association()
    {
        return $this->belongsTo(Association::class);
    }

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function xamxams()
    {
        return $this->hasMany(Xamxam::class);
    }

    public function annonces()
    {
        return $this->hasMany(Annonce::class);
    }

    public function feusseuls()
    {
        return $this->hasMany(Feusseul::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function interesse()
    {
        return $this->belongsTo(Interesse::class);
    }

    public function commentaires()
    {
        return $this->hasMany(Commentaire::class);
    }
}
