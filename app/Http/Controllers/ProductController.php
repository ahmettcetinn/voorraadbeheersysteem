<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Categorie;
use App\Models\Reservering;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Check of de huidige gebruiker een docent is.
     * Zo niet, abort met 403 error.
     */
    private function checkDocent()
    {
        if (!Auth::user()->isDocent()) {
            abort(403, 'Alleen docenten mogen dit doen.');
        }
    }

    public function index(Request $request)
    {
        $query = Product::with('categorie');

        // Zoeken op naam, type of locatie
        if ($request->filled('zoeken')) {
            $zoekterm = $request->zoeken;
            $query->where(function ($q) use ($zoekterm) {
                $q->where('Naam', 'LIKE', '%' . $zoekterm . '%')
                    ->orWhere('Type', 'LIKE', '%' . $zoekterm . '%')
                    ->orWhere('Locatie', 'LIKE', '%' . $zoekterm . '%');
            });
        }

        // Filteren op categorie
        if ($request->filled('categorie')) {
            $query->where('CategorieID', $request->categorie);
        }

        $producten = $query->get();

        // Check welke producten actief gereserveerd zijn
        foreach ($producten as $product) {
            $product->isGereserveerd = Reservering::where('ProductID', $product->ProductID)
                ->where('Status', 'actief')
                ->exists();

            $product->gereserveerdAantal = Reservering::where('ProductID', $product->ProductID)
                ->where('Status', 'actief')
                ->sum('Aantal');
        }

        // Alle categorieën ophalen voor de dropdown
        $categorieen = Categorie::all();

        return view('producten.index', compact('producten', 'categorieen'));
    }

    public function create()
    {
        $this->checkDocent(); // Alleen docent mag producten toevoegen

        $categorieen = Categorie::all();
        return view('producten.create', compact('categorieen'));
    }

    public function store(Request $request)
    {
        $this->checkDocent(); // Alleen docent mag producten opslaan

        $data = [
            'Naam' => $request->Naam,
            'Type' => $request->Type,
            'Aantal' => $request->Aantal,
            'Locatie' => $request->Locatie,
            'CategorieID' => $request->CategorieID,
            'Beschrijving' => $request->Beschrijving,
        ];

        // Afbeelding uploaden
        if ($request->hasFile('Afbeelding')) {
            $afbeelding = $request->file('Afbeelding');
            $naam = time() . '_' . $afbeelding->getClientOriginalName();
            $afbeelding->move(public_path('afbeeldingen'), $naam);
            $data['Afbeelding'] = 'afbeeldingen/' . $naam;
        }

        Product::create($data);

        return redirect()->route('producten.index')->with('success', 'Product toegevoegd!');
    }

    public function edit($id)
    {
        $this->checkDocent(); // Alleen docent mag producten bewerken

        $product = Product::findOrFail($id);
        $categorieen = Categorie::all();
        return view('producten.edit', compact('product', 'categorieen'));
    }

    public function update(Request $request, $id)
    {
        $this->checkDocent(); // Alleen docent mag producten updaten

        $product = Product::findOrFail($id);

        $data = [
            'Naam' => $request->Naam,
            'Type' => $request->Type,
            'Aantal' => $request->Aantal,
            'Locatie' => $request->Locatie,
            'CategorieID' => $request->CategorieID,
            'Beschrijving' => $request->Beschrijving,
        ];

        // Afbeelding uploaden (alleen als er een nieuwe is)
        if ($request->hasFile('Afbeelding')) {
            // Oude afbeelding verwijderen
            if ($product->Afbeelding && file_exists(public_path($product->Afbeelding))) {
                unlink(public_path($product->Afbeelding));
            }

            $afbeelding = $request->file('Afbeelding');
            $naam = time() . '_' . $afbeelding->getClientOriginalName();
            $afbeelding->move(public_path('afbeeldingen'), $naam);
            $data['Afbeelding'] = 'afbeeldingen/' . $naam;
        }

        $product->update($data);

        return redirect('/')->with('success', 'Product bijgewerkt!');
    }

    public function destroy($id)
    {
        $this->checkDocent(); // Alleen docent mag producten verwijderen

        $product = Product::findOrFail($id);

        // Oude afbeelding verwijderen
        if ($product->Afbeelding && file_exists(public_path($product->Afbeelding))) {
            unlink(public_path($product->Afbeelding));
        }

        $product->delete();

        return redirect()->route('producten.index')->with('success', 'Product verwijderd!');
    }

    public function detail($id)
    {
        $product = Product::with(['categorie'])->findOrFail($id);

        // Check of product gereserveerd is
        $product->isGereserveerd = Reservering::where('ProductID', $product->ProductID)
            ->where('Status', 'actief')
            ->exists();

        $product->gereserveerdAantal = Reservering::where('ProductID', $product->ProductID)
            ->where('Status', 'actief')
            ->sum('Aantal');

        // Laatste reserveringen voor dit product
        $reserveringen = Reservering::with('gebruiker')
            ->where('ProductID', $product->ProductID)
            ->orderBy('ReserveringID', 'desc')
            ->take(5)
            ->get();

        return view('producten.detail', compact('product', 'reserveringen'));
    }
}