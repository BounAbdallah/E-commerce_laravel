<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference', 
        'etat_commande', 
        'montant_total', 
        'client_id'
    ];

      public function client()
      {
          return $this->belongsTo(Client::class);
      }
      public function produits()
      {
          return $this->belongsToMany(Produit::class, 'commande_produits')->withPivot('quantite');
      }
}