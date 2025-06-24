<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Recipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {

    }

    public function recipes()
    {
        $recipes = Recipe::all();
        return view('admin.recipes', compact('recipes'));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function ban($id)
    {
        $user = User::query()->find($id);
        $user->is_banned = !$user->is_banned;
        $user->save();
        return redirect()->route('admin.users.index');
    }

    public function delete($id)
    {
        $user = User::query()->find($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function publish($id)
    {
        Recipe::query()->where('id', $id)->update(['is_published' => true]);
        return redirect()->route('admin.recipes.index');
    }

    public function editRecipe($id)
    {
        $categories = Category::query()->get();
        $recipe = Recipe::query()->find($id);
        return view('admin.recipes_edit', compact(['recipe', 'categories']));
    }

    public function updateRecipe(Request $request, $id)
    {

        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]);

        $recipe = Recipe::query()->where('id', $id)->update($validated);

        if ($request->hasFile('image')) {
            if (!empty($recipe->image)) {
                Storage::delete($recipe->image);
            }
            $image = $request->file('image')->store('uploads');
            Recipe::query()->where('id', $id)->update(['image' => $image]);

        }

        return Redirect::route('admin.recipes.index')->with('status', 'profile-updated');
    }

    public function createRecipe()
    {
        $categories = Category::query()->get();
        return view('admin.recipes_create', compact('categories'));
    }

    public function storeRecipe(Request $request)
    {

        $validated = ($request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'ingredients' => ['required', 'array', 'min:1'],
            'ingredients.*.quantity' => ['required', 'numeric'],
            'ingredients.*.unit' => ['required', 'string', 'max:255'],
            'ingredients.*.name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'exists:categories,id'],
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg',
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
        $image = $request->file('image')->store('uploads');

        $recipe = Recipe::create([
            'title' => $validated['name'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'image' => $image,
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
        return Redirect::route('admin.recipes.index')->with('status', 'profile-updated');


    }
}
