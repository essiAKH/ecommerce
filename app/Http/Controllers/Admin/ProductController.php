<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // Affiche la liste des produits
    public function index()
    {
        $products = Product::with('category')->get();
        return view('admin.products.index', compact('products'));
    }

    // Affiche le formulaire de création
    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    // Enregistre un nouveau produit
    public function store(Request $request)
    {
        $request->validate([
            'pro_name' => 'required|string|max:255',
            'pro_price' => 'required|numeric|min:0',
            'categories_id' => 'required|exists:categories,id',
            'pro_desc' => 'nullable|string',
        ]);

        Product::create([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'categories_id' => $request->categories_id,
            'pro_desc' => $request->pro_desc,
            'users_id' => 1, // temporairement fixe (ou automatique plus tard)
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit ajouté avec succès.');
    }

    // Affiche le formulaire d'édition
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Met à jour un produit
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'pro_name' => 'required|string|max:255',
            'pro_price' => 'required|numeric|min:0',
            'categories_id' => 'required|exists:categories,id',
            'pro_desc' => 'nullable|string',
        ]);

        $product->update([
            'pro_name' => $request->pro_name,
            'pro_price' => $request->pro_price,
            'categories_id' => $request->categories_id,
            'pro_desc' => $request->pro_desc,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Produit mis à jour.');
    }

    // Supprime un produit
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Produit supprimé.');
    }
}
