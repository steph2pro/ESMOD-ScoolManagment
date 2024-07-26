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

    public function etudiant()
    {
        return $this->hasMany(Etudiant::class);
    }

}
