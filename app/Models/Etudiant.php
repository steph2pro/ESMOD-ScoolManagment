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
        'mot_de_pass',
        'utilisateur_id',
        'campus_id',
        'specialite_id',
        'scolarite_id'
    ];

    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(Utilisateur::class);
    }

    public function specialite()
    {
        return $this->belongsTo(Specialite::class);
    }

    public function versements()
    {
        return $this->hasMany(Versement::class);
    }

    public function scolarite()
    {
        return $this->belongsTo(Scolarite::class);
    }


    /**
     * Génère un mot de passe selon le format spécifié.

     */
    public function generatePassword()
    {
        // Lettre "P"
        $prefix = 'P';

        // ID de l'étudiant
        $id = $this->id;

        // Extraction des deux premières lettres du nom
        $noms = explode(' ', trim($this->nom_prenom));
        if (count($noms) < 2) {
            // Gestion du cas où le nom complet ne contient qu'un seul mot
            $nom = strtoupper(substr($noms[0], 0, 2));
        } else {
            $nom = strtoupper(substr($noms[1], 0, 2));
        }

        // 4 chiffres aléatoires
        $randomDigits = rand(1000, 9999);

        // Assemblage du mot de passe
        $plainPassword = $prefix . $id . $nom . $randomDigits;

        // Hash du mot de passe avant de le stocker
        $this->mot_de_pass;

        // Optionnel : Retourner le mot de passe en clair si tu souhaites l'afficher ou l'envoyer
        return $plainPassword;
    }


    //methode de conversion
    public function convertNumberToWords($number) {
        $units = [
            '', 'un', 'deux', 'trois', 'quatre', 'cinq', 'six', 'sept', 'huit', 'neuf', 'dix',
            'onze', 'douze', 'treize', 'quatorze', 'quinze', 'seize', 'dix-sept', 'dix-huit', 'dix-neuf'
        ];

        $tens = [
            '', '', 'vingt', 'trente', 'quarante', 'cinquante', 'soixante', 'soixante-dix', 'quatre-vingt', 'quatre-vingt-dix'
        ];

        if ($number == 0) {
            return 'zéro';
        }

        if ($number < 20) {
            return $units[$number];
        }

        if ($number < 100) {
            if ($number < 70) {
                return $tens[intval($number / 10)] . ($number % 10 ? '-' . $units[$number % 10] : '');
            } elseif ($number < 80) {
                return 'soixante' . ($number == 71 ? '-et-onze' : '-' . $units[$number % 10 + 10]);
            } else {
                return 'quatre-vingt' . ($number % 10 ? '-' . $units[$number % 10] : '');
            }
        }

        if ($number < 1000) {
            return ($number < 200 ? 'cent' : $units[intval($number / 100)] . ' cent') .
                   ($number % 100 ? ' ' . $this->convertNumberToWords($number % 100) : '');
        }

        if ($number < 1000000) {
            return ($number < 2000 ? 'mille' : $this->convertNumberToWords(intval($number / 1000)) . ' mille') .
                   ($number % 1000 ? ' ' . $this->convertNumberToWords($number % 1000) : '');
        }

        return $number;
    }

}
