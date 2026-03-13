<?php

namespace App\Http\Controllers;

use App\Models\MenuCategory;

class PublicController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function menu()
    {
        $foodCategories = MenuCategory::where('type', 'food')
            ->orderBy('sort_order')
            ->with(['items' => fn($q) => $q->where('available', true)])
            ->get();

        $drinkCategories = MenuCategory::where('type', 'drink')
            ->orderBy('sort_order')
            ->with(['items' => fn($q) => $q->where('available', true)])
            ->get();

        return view('public.menu', compact('foodCategories', 'drinkCategories'));
    }

    public function spaces()
    {
        return view('public.spaces');
    }
}
