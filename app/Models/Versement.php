<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Versement extends Model
{
    use HasFactory;

    // Spécifie les champs qui peuvent être assignés en masse
    protected $fillable = [
        'montant',
        'objet_paiement',
        'mode_paiement',
        'date_paiement',
        'etudiant_id',
    ];

    /**
     * Relation avec le modèle Etudiant.
     * Un versement appartient à un étudiant.
     */
    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
