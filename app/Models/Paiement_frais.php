<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Paiement_frais extends Model
{
    use HasFactory;

    protected $fillable = [
        'date_paiement',
        'montant'
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
