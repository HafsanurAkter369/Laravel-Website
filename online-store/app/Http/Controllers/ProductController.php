<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = trim((string) $request->query('search', ''));
        $selectedCategory = (string) $request->query('category', '');

        $query = Product::query();

        if ($selectedCategory !== '') {
            $query->where('category', $selectedCategory);
        }

        if ($search !== '') {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        $products = $query->orderBy('id')->get();

        $categories = Product::select('category')
            ->distinct()
            ->orderBy('category')
            ->pluck('category');

        // Category cards: category name and how many products it has
        $categoryCards = Product::select('category')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('category')
            ->orderBy('category')
            ->get();

        return view('products.index', compact(
            'products',
            'categories',
            'categoryCards',
            'search',
            'selectedCategory'
        ));
    }
}