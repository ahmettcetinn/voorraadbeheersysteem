<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $producten = Product::with('categorie')->get();
        return view('producten.index', compact('producten'));
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