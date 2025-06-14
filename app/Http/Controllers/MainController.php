<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\Recipe;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class MainController extends Controller
{
   /**
    * Display a listing of the resource.
    */
   public function index()
   {
      $news = News::query()->orderBy('created_at', 'desc')->limit(4)->get();
      $popularRecipes = Recipe::query()->orderBy('likes', 'desc')->limit(4)->get();
      return view('home.index', compact(['popularRecipes', 'news']));
   }

   public function catalog(Request $request)
   {
      $categories = Category::query()->has('recipes')->get();
      if ($request->has('category') && $request->input('category') != 'all') {
         $recipes = Recipe::query()->whereHas('category', function ($query) use ($request) {
            $query->where('name', $request->input('category'));
         })->get();
         return view('home.catalog', compact(['recipes', 'categories']));
      }
      $recipes = Recipe::query()->orderBy('created_at', 'desc')->get();
      return view('home.catalog', compact(['recipes', 'categories']));
   }
}
