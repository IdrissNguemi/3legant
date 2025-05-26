<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ProductPolicy
{
    /**
     * Détermine si l'utilisateur peut voir la liste des produits.
     */
    public function viewAny(?User $user): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut voir un produit spécifique.
     */
    public function view(?User $user, Product $product): bool
    {
        // Tout le monde peut voir un produit spécifique
        return true;
    }

    /**
     * Détermine si l'utilisateur peut créer des produits.
     */
    public function create(): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut mettre à jour un produit.
     */
    public function update(): bool
    {
        return true;
    }

    /**
     * Détermine si l'utilisateur peut supprimer un produit.
     */
    public function delete(): bool
    {
        return true;
    }
}
