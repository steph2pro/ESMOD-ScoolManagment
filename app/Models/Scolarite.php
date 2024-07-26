<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Specialite;

class Scolarite extends Model
{
    use HasFactory;

    protected $fillable = [
        'annee_scolaire',
        'montant_total',
        'montant_paye',
        'montant_restant',
        'frais_inscription',
    ];

    public function specialite()
    {
        return $this->hasMany(Specialite::class);
    }
}
