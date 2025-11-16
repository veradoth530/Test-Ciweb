<?php

namespace Database\Seeders;

use App\Models\Famille;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FamilleSeeder extends Seeder
{
    /**
     * Création des 5 familles dans la table 'famille'.
     */
    public function run(): void
    {

        DB::table('famille')->delete();

        DB::statement('ALTER TABLE famille AUTO_INCREMENT = 1');

        $tab_famille = ['Vêtements', 'Electronique', 'Alimentation', 'Beauté', 'Jouets', 'Meubles', 'Sport', 'Jardinage', 'Bricolage', 'Papeterie'];

        for($i = 0; $i < 5; $i++){
            $index = array_rand($tab_famille); //Choisis un chiffre aléatoire ne dépassant la taille du tableau.
            $famille = $tab_famille[$index];   //Enregistre l'élément avec l'indice récupérer.
            unset($tab_famille[$index]);       //Suppression de l'élément pour éviter les doublons.
            

            Famille::create([
                'nom' => $famille,
        ]);
        }
        
    }
}
