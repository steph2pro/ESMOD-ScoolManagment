<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Utilisateur;
use App\Models\Campus;
use App\Models\Specialite;
use App\Models\Paiement_frais;
use App\Models\Scolarite;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom_prenom',
        'sexe',
        'email',
        'mobile',
        'utilisateur_id',
        'campus_id',
        'specialite_id',
        'scolarite_id'
    ];

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function paiement()
    {
        return $this->hasMany(Paiement_frais::class);
    }

    public function scolarite()
    {
        return $this->belongsTo(Scolarite::class);
    }
    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($etudiant) {
    //         // Supprimer la scolarité associée
    //         $etudiant->scolarite()->delete();
    //     });
    // }
}
