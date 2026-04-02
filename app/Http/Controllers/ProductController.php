<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('categorie');

        // Search by name, type, or location
        if ($request->filled('zoeken')) {
            $zoekterm = $request->zoeken;
            $query->where(function ($q) use ($zoekterm) {
                $q->where('Naam', 'LIKE', '%' . $zoekterm . '%')
                    ->orWhere('Type', 'LIKE', '%' . $zoekterm . '%')
                    ->orWhere('Locatie', 'LIKE', '%' . $zoekterm . '%');
            });
        }

        // Filter by category
        if ($request->filled('categorie')) {
            $query->where('CategorieID', $request->categorie);
        }

        $producten = $query->get();

        // Get all categories for the dropdown
        $categorieen = Categorie::all();

        return view('producten.index', compact('producten', 'categorieen'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categorieen = Categorie::all();
        return view('producten.edit', compact('product', 'categorieen'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update([
            'Naam' => $request->Naam,
            'Type' => $request->Type,
            'Aantal' => $request->Aantal,
            'Locatie' => $request->Locatie,
            'CategorieID' => $request->CategorieID,
        ]);
        return redirect('/');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('producten.index')->with('success', 'Product verwijderd!');
    }

    public function create()
    {
        $categorieen = Categorie::all();
        return view('producten.create', compact('categorieen'));
    }

    public function store(Request $request)
    {
        Product::create([
            'Naam' => $request->Naam,
            'Type' => $request->Type,
            'Aantal' => $request->Aantal,
            'Locatie' => $request->Locatie,
            'CategorieID' => $request->CategorieID,
        ]);

        return redirect()->route('producten.index')->with('success', 'Product toegevoegd!');
    }
}