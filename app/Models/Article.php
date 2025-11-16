<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Modèle représentant la table 'article' dans la base de données.
 * Permet d'intéragir avec les articles.
 */
class Article extends Model
{
    use HasFactory;

    protected $table = 'article'; //Indique que le nom de la table s'appelle 'article'

    /**
     * Champs pouvant être renseignés automatiquement via les méthodes create() et update().
     */
    protected $fillable = [
        'nom',
        'prix_ht',
        'prix_achat',
        'taux_tgc',
        'famille_id'
    ];

    /**
     * Relation entre Article et Famille.
     * Permet de récupérer les informations de Famille depuis un article.
     */
    public function famille(){
        return $this->belongsTo(Famille::class);
    }

}