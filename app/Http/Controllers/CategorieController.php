<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        $categorieen = Categorie::all();
        return view('categorieen.index', compact('categorieen'));
    }
}