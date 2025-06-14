<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use function Laravel\Prompts\error;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();

        return view('recipe.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = ($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'ingredients' => ['required', 'array', 'min:1'],
            'ingredients.*.quantity' => ['required', 'numeric'],
            'ingredients.*.unit' => ['required', 'string', 'max:255'],
            'ingredients.*.name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
        ], [
            'name.required' => 'The name field is required.',
            'description.required' => 'The description field is required.',
            'ingredients.required' => 'The ingredients field is required.',
            'ingredients.*.quantity.required' => 'The quantity field is required.',
            'ingredients.*.unit.required' => 'The unit field is required.',
            'ingredients.*.name.required' => 'The name field is required.',
            'category_id.required' => 'The category field is required.',
            'category_id.exists' => 'The category does not exist.',
        ]));

        $recipe = Recipe::create([
            'title' => $validated['name'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::user()->id,
        ]);


        foreach ($validated['ingredients'] as $ingredient) {
            $recipe->ingredients()->create([
                'name' => $ingredient['name'],
                'quantity' => $ingredient['quantity'],
                'unit' => $ingredient['unit'],
                'recipe_id' => $recipe->id
            ]);

        }

        return redirect()->route('recipe.show', ['id' => $recipe->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $recipe = Recipe::query()->find($id)->load('ingredients');
        return view('recipe.show', compact('recipe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        //
    }
}
