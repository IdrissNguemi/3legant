<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|string',
            'productColor' => 'required|in:white,black,maroon',
            'productImage' => 'nullable|image|max:2048' // Modifié ici (productImage au lieu de productImagePath)
        ]);

        // Retirez productImage du tableau validé car nous allons le traiter séparément
        if (isset($validated['productImage'])) {
            unset($validated['productImage']);
        }

        // Traiter l'image si elle existe
        if ($request->hasFile('productImage')) { // Modifié ici (productImage au lieu de productImagePath)
            $path = $request->file('productImage')->store('products', 'public');
            $validated['productImagePath'] = $path; // On stocke le chemin dans productImagePath
        }

        Product::create($validated);

        return response()->json(['message' => 'Produit ajouté avec succès'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return response()->json($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'productName' => 'required|string|max:255',
            'productPrice' => 'required|numeric',
            'productDescription' => 'required|string',
            'productColor' => 'required|in:white,black,maroon',
            'productImage' => 'nullable|image|max:2048' // Modifié ici
        ]);

        // Retirez productImage du tableau validé
        if (isset($validated['productImage'])) {
            unset($validated['productImage']);
        }

        // Traiter l'image si elle existe
        if ($request->hasFile('productImage')) {
            // Supprimer l'ancienne image si elle existe
            if ($product->productImagePath) {
                Storage::disk('public')->delete($product->productImagePath);
            }

            $path = $request->file('productImage')->store('products', 'public');
            $validated['productImagePath'] = $path;
        }

        $product->update($validated);

        return response()->json($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Supprimer l'image associée si elle existe
        if ($product->productImagePath) {
            Storage::disk('public')->delete($product->productImagePath);
        }

        $product->delete();
        return response()->json(['message' => 'Product deleted']);
    }
}
