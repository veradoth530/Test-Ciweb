<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;        //Utilisation de la librairie Faker

class ArticleSeeder extends Seeder
{
    /**
     * Création des 50 articles dans la table 'article'.
     */

    public function run(): void
    {

        DB::table('article')->delete();

        DB::statement('ALTER TABLE article AUTO_INCREMENT = 1');

        for($i=0; $i<50; $i++){

            //Utilisation de Faker pour la génération de données aléatoires.
            $faker = Faker::create();

            $prix_ht = $faker->numberBetween(1000,10000);  //Créer un nombre entre 1000 et 10000
        
            Article::create([
                'nom' => $faker->word, //Créer un mot aléatoire
                'prix_ht' => $prix_ht,
                'prix_achat' => $faker->numberBetween(100,$prix_ht),  //Créer un nombre entre 100 et le nombre stockée dans $prix_ht
                    'taux_tgc' => $faker->randomElement([3,6,11,22]), //Choisis entre 3, 6, 11 ou 22.
            'famille_id' => $faker->numberBetween(1,5),           
            ]);
        }
        
    }
}
