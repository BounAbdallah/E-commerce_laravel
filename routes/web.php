<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\PanierController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ProduitController;
use App\Models\Categorie;
use App\Models\Personnel;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', [ProduitController::class,'listeAccueil']);
Route::get('/categorie/{categorie}', [ProduitController::class, 'produitsParCategorie'])->name('produits.par.categorie');
Route::get('/boutique', [ProduitController::class, 'boutique']);

// Routes d'authentification du client
Route::get('/inscriptionClient', [ClientController::class, 'ajoutClient']);
Route::post('/sauvegardeClient', [ClientController::class , 'sauvegardeClient']);
Route::get('/connexionClient', [ClientController::class, 'connexion']);
Route::post('/traitementConnexionClient', [ClientController::class, 'traitementConnexion']);
Route::get('/deconnexionClient', [ClientController::class, 'deconnexion']);

// Middleware pour les utilisateurs authentifiés en tant que client
Route::middleware(['VerificationClient'])->group(function () {
    Route::get('/profil', [ProduitController::class,'produitCategorie']);
    Route::post('/ajoutPanier/{produits}', [PanierController::class, 'ajoutPanier']);
    Route::get('/voirPanier', [PanierController::class, 'voirPanier']);
    Route::post('/supprimerDuPanier', [PanierController::class, 'supprimerDuPanier']);
    Route::get('/validerCommande', [PanierController::class, 'validerCommande']);
    Route::post('/traiterCommande', [PanierController::class, 'traiterCommande']);
    Route::get('/shop' , [ProduitController::class, 'shop']);
    Route::get('/categories/{categorie}', [ProduitController::class, 'produitsParCategories']);
    Route::get('/mesCommandes', [ClientController::class, 'mesCommandes'])->name('mesCommandes');
    Route::get('/commande/{id}', [ClientController::class, 'detailCommande'])->name('detailCommande');
    Route::get('/commande/{id}/edit', [PanierController::class, 'edit'])->name('commande.edit');
    Route::post('/commande/{id}/update', [PanierController::class, 'update'])->name('commande.update');
});

// Routes nécessitant une session vérifiée
Route::middleware(['CheckSession'])->group(function () {
    Route::get('/categories', [CategorieController::class, 'listeCategories']);
    Route::get('/ajoutCategorie', [CategorieController::class, 'ajoutCategorie']);
    Route::post('/sauvegardeCategorie', [CategorieController::class, 'sauvegardeCategorie']);
    Route::get('/supprimer/{id}', [CategorieController::class, 'supprimerCategorie']);
    Route::get('/modificationCategorie/{id}', [CategorieController::class, 'modificationCategorie']);
    Route::post('/modificationCategorie', [CategorieController::class, 'sauvegardeModification']);

    Route::get('/espacePersonnel', [ProduitController::class,'listeProduits']);
    Route::get('/ajoutProduit', [ProduitController::class,'ajoutProduit']);
    Route::post('/sauvegardeProduit', [ProduitController::class, 'sauvegardeProduit']);
    Route::get('/supprimeProduit/{id}', [ProduitController::class, 'supprimeProduit']);
    Route::get('/modificationProduit/{id}', [ProduitController::class, 'modificationProduit']);
    Route::post('/modificationProduit', [ProduitController::class, 'sauvegardeModification']);

    Route::get('/touteLesCommandes', [PersonnelController::class, 'toutesLesCommandes']);
    Route::get('/commandePersonnel/{id}', [PersonnelController::class, 'detailCommande']);
});

// Routes d'authentification du personnel
Route::get('inscription', [PersonnelController::class, 'ajoutPersonnel']);
Route::post('/sauvegardePersonnel', [PersonnelController::class , 'sauvegardePersonnel']);
Route::get('/connexion', [PersonnelController::class, 'connexion']);
Route::post('/traitementConnexion', [PersonnelController::class, 'traitementConnexion']);
Route::get('/deconnexion', [PersonnelController::class, 'deconnexion']);