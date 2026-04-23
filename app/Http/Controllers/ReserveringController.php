<?php

namespace App\Http\Controllers;

use App\Models\Reservering;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReserveringController extends Controller
{
    // Toon alle reserveringen
    public function index()
    {
        $reserveringen = Reservering::with(['product', 'gebruiker'])->get();
        return view('reserveringen.index', compact('reserveringen'));
    }

    // Toon formulier om nieuwe reservering te maken
    public function create()
    {
        $producten = Product::all();

        // Alleen docent mag voor andere mensen reserveren
        // Student mag alleen voor zichzelf
        if (Auth::user()->isStudent()) {
            $gebruikers = null; // Student krijgt geen lijst
        } else {
            $gebruikers = \App\Models\Gebruiker::all(); // Docent krijgt alle gebruikers
        }

        return view('reserveringen.create', compact('producten', 'gebruikers'));
    }

    // Sla nieuwe reservering op
    public function store(Request $request)
    {
        // Check of er genoeg producten op voorraad zijn
        $product = Product::findOrFail($request->ProductID);

        if ($product->Aantal < $request->Aantal) {
            return back()->with('error', 'Niet genoeg voorraad! Beschikbaar: ' . $product->Aantal);
        }

        // Bepaal voor wie de reservering is
        if (Auth::user()->isStudent()) {
            // Student mag alleen voor zichzelf reserveren
            $gebruikerID = Auth::user()->GebruikerID;
        } else {
            // Docent mag voor iedereen reserveren (uit formulier)
            $gebruikerID = $request->GebruikerID;
        }

        // Maak reservering aan
        Reservering::create([
            'ProductID' => $request->ProductID,
            'GebruikerID' => $gebruikerID,
            'Aantal' => $request->Aantal,
            'Datum' => $request->Datum,
            'Status' => 'actief',
        ]);

        // Verminder voorraad
        $product->Aantal = $product->Aantal - $request->Aantal;
        $product->save();

        return redirect()->route('reserveringen.index')->with('success', 'Reservering aangemaakt!');
    }

    // Verwijder reservering (annuleren)
    public function destroy($id)
    {
        $reservering = Reservering::findOrFail($id);

        /** @var \App\Models\Gebruiker $user */
        $user = Auth::user();

        // Check: student mag alleen eigen reservering annuleren
        // Docent mag alles annuleren
        if ($user->isStudent() && $reservering->GebruikerID !== $user->GebruikerID) {
            abort(403, 'Je mag alleen je eigen reserveringen annuleren.');
        }

        // Geef voorraad terug
        $product = Product::findOrFail($reservering->ProductID);
        $product->Aantal = $product->Aantal + $reservering->Aantal;
        $product->save();

        $reservering->delete();

        return redirect()->route('reserveringen.index')->with('success', 'Reservering geannuleerd!');
    }
}