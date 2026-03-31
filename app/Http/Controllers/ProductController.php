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
}