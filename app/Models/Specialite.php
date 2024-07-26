<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Scolarite;

class Specialite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function scolarite()
    {
        return $this->belongsTo(Scolarite::class);
    }

    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }
}
