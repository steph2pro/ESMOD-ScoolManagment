<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scolarite;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = [
        'libele',
        'abreviation',
        'frais_scolarite',
        'frais_inscription',
    ];



    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
