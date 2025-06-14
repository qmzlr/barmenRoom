<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __invoke(): View
    {
        $news = News::query()->orderBy('created_at', 'desc')->limit(4)->get();
        $popularRecipes = Recipe::query()->orderBy('likes', 'desc')->limit(4)->get();
        return view('home.index', compact(['popularRecipes', 'news']));
    }
}
