<?php

use Illuminate\Support\Facades\Route;         //Gestion des routes
use App\Http\Controllers\ArticleController;   //Import du contrôleur des articles

/**
 * Route affichant la liste des articles.
 * Pointe vers la méthode index().
 */
Route::get('/', [ArticleController::class, 'index'])->name('accueil');

/**
 * Route premettant d'exporter les articles au format CSV.
 * Méthode exporter().
 */
Route::get('/articles/exporter', [ArticleController::class, 'exporter'])->name('articles.exporter');


/**
 * Affichage du formulaire de création d'un nouvel article.
 */
Route::get('/articles/creer', [ArticleController::class, 'create'])->name('articles.creer');

/**
 * Insertion de l'article dans la base de données.
 */
Route::post('/articles', [ArticleController::class, 'ajout'])->name('articles.ajout');

/**
 * Affichage du formulaire de modification d'un article existant.
 * Utilisation du paramètre {id} pour récupérer l'identifiant de l'article sélectionnée.
 */
Route::get('/articles/{id}/modifier', [ArticleController::class, 'modifier'])->name('articles.modifier');

/**
 * Mise à jour de l'article.
 */
Route::put('/articles/{id}', [ArticleController::class, 'update'])->name('articles.update');

/**
 * Affichage du formulaire de confirmation de suppresssion.
 */
Route::get('/articles/{id}/confirmerSuppression', [ArticleController::class, 'confirmerSuppression'])->name('articles.confirmerSuppression');

/**
 * Suppression de l'article.
 */
Route::delete('/articles/{id}', [ArticleController::class, 'supprimer'])->name('articles.supprimer');