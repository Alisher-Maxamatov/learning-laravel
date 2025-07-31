<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // 1
    public function searchTask1(Request $request)
    {
        $search = $request->get('search');
        $products = Product::searchByDescription($search);

        return view('products.results', [
            'products' => $products,
            'search' => $search,
            'task' => '1-vazifa: Description qidiruvi'
        ]);
    }

    // 2
    public function searchTask2(Request $request)
    {
        $search = $request->get('search');
        $products = Product::searchCombined($search);

        return view('products.results', [
            'products' => $products,
            'search' => $search,
            'task' => '2-vazifa: Combined qidiruv'
        ]);
    }
}
