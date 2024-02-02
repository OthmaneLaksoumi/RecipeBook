<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class RecipeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'recipes_for_search']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recipes = Recipe::all();
        $isActive = true;
        return view('recipe.index', compact('recipes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('recipe.create', compact('categories'));
    }

    public function myRecipes(User $user)
    {
        // $recipes = Recipe::where('user_id', $user_id)->get();
        $recipes = $user->recipes();
        return view('recipe.myRecipes', compact('recipes'));
    }
    // 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->ingredient === null);
        if($request->ingredient === null) {
            return back()->with('error', 'The ingredients field is required');
        }
        $validated = $request->validate([
            'title' => 'required|min:8',
            'content' => 'required|min:30',
            'image' => 'required|image|mimes:png,jpg,jpeg|max:10240',
            'category_id' => 'exists:categories,id|required',
        ]);

        $validated['user_id'] = auth()->user()->id;
        $validated['image'] = $request->file('image')->store('recipes', 'public');

        $recipe_id = Recipe::create($validated)->id;
        $ingredients = $request->ingredient;
        foreach($ingredients as $ingredient) {
            $data = [
                'ingredient' => $ingredient,
                'recipe_id' => $recipe_id,
            ];
            Ingredient::create($data);
        }

        return to_route('recipes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe)
    {
        $ingredients = Ingredient::where('recipe_id', '=', $recipe->id)->get();
        $comments = Comment::where('recipe_id', '=', $recipe->id)->get();
        $users = array();
        foreach($comments as $comment) {
            $user = User::find($comment->user_id);
            $users[$comment->user_id] = $user;
        }
        return view('recipe.show', compact('recipe', 'ingredients', 'comments', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe)
    {        
        $categories = Category::all();
        return view('recipe.edit', compact('categories', 'recipe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ];

        if($request->file('image') !== null) {
            $data['image'] = $request->file('image')->store('recipes', 'public');
            Storage::delete('public/' . $recipe->image);
        }

        $recipe->fill($data)->save();

        return to_route('recipes.edit', $recipe);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return to_route('recipes.myRecipes', $recipe->user_id);
    }

    /**
     * Search Result
     */

     public function recipes_for_search(Request $request) {
        // $recipes = DB::table('recipes')->where('title', 'like', '%' . $search . '%')->get();
        $search = $request->search;
        $recipes = Recipe::where('title', 'like', '%' . $search . '%')->get();
        return view('recipe.index', compact('recipes'));
     }
}
