<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Etudiant;

class Campus extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'adresse'
    ];

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    /**
     * Compte le nombre d'étudiants pour un campus donné par son ID.
     *
     * @param int $campusId
     * @return int
     */
    public static function countEtudiantsByCampusId($campusId)
    {
        // On utilise la relation pour compter les étudiants du campus
        return self::where('id', $campusId)->first()->etudiants()->count();
    }

}
