<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modèle représentant la table 'famille' dans la base de données.
 * Permet d'intéragir avec les familles.
 */
class Famille extends Model
{
    use HasFactory;

    protected $table = 'famille'; //Indique à Laravel que le nom de la table s'appelle 'famille'

    protected $fillable = ['nom'];
}
