<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Famille;

class ArticleController extends Controller{

    /**
     * Affiche la liste des articles sur la page d'accueil
     */
    public function index(){

        $articles = DB::table('article')->get();

        return view('accueil', compact('articles'));
    }

    /**
     * Affiche la page de création d'un article
     */
    public function create(){

        $familles = DB::table('famille')->get();

        return view('creer', compact('familles'));
    }

    /**
     * Enregistre l'article dans la base de données
     */
    public function ajout(Request $requete){

        //Vérifie que les données du formulaire respecte les conditions
        $requete->validate([
            'nom' => 'required|string',
            'prix_ht' => 'required|numeric|between:1000,10000',
            'prix_achat' => 'required|numeric|lt:prix_ht',
            'taux_tgc' => 'required|in:3,6,11,22',
            'famille_id' => 'required|exists:famille,id',
        ]);

        //Insère les données dans la base de données
        Article::create($requete->all());

        //Retour à l'accueil avec un message de confirmation
        return redirect()->route('accueil')->with('success', 'Article ajouté !');
    }

    /**
     * Affiche la page de modification d'un article
     */
    public function modifier($id){
        $article = Article::findOrFail($id);
        $familles = Famille::all();

        return view('modifier', compact('article', 'familles'));
    }

    /**
     * Met à jour l'article
     */
    public function update(Request $requete, $id){

        $requete->validate([
            'nom' => 'required|string',
            'prix_ht' => 'required|numeric|between:1000,10000',
            'prix_achat' => 'required|numeric|lt:prix_ht',
            'taux_tgc' => 'required|in:3,6,11,22',
            'famille_id' => 'required|exists:famille,id',
        ]);

        $article = Article::findOrFail($id);

        //Mise à jour des valeurs
        $article->update([
            'nom' => $requete->nom,
            'prix_ht' => $requete->prix_ht,
            'prix_achat' => $requete->prix_achat,
            'taux_tgc' => $requete->taux_tgc,
            'famille_id' => $requete->famille_id,
        ]);

        return redirect()->route('accueil')->with('success', 'Article modifié !');
    }

    /**
     * Affiche la page de confirmation avant supression
     */
    public function confirmerSuppression($id){

        $article = Article::findOrFail($id);
        return view('confirmerSuppression', compact('article'));
    }

    /**
     * Supprime l'article sélectionnée de la base de données
     */
    public function supprimer($id){

        $article = Article::findOrFail($id);

        $article->delete();

        return redirect()->route('accueil')->with('success', 'Article supprimé !');
    }

    //Méthode permettant d'exporter les articles dans un fichier csv
    public function exporter(){

        $articles = Article::all();
        $filename = "articles.csv";

        //Créer le fichier CSV
        $handle = fopen($filename, 'w+');

        //Insère les noms des colonnes
        fputcsv($handle, ['Id', 'Nom', 'Prix HT', 'Prix achat', 'Taux TGC', 'Famille', 'Prix TTC', 'Marge'], ';');

        foreach($articles as $article){

            $prix_ttc = $article->prix_ht * (1 + $article->taux_tgc);
            $marge = $article->prix_ht - $article->prix_achat;

            fputcsv($handle, [
                $article->id,
                $article->nom,
                $article->prix_ht,
                $article->prix_achat,
                $article->taux_tgc,
                $article->famille->nom,
                $prix_ttc,
                $marge ?? ''
            ], ';');
        }

        fclose($handle);

        //Télécharge le fichier
        return response()->download($filename, 'articles.csv', [ 'Content-Type' => 'text/csv']);
    }
}