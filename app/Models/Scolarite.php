<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Scolarite extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee_scolaire',
        'montant_total',
        'montant_paye',
        'montant_restant',
        'montant_inscription',
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
