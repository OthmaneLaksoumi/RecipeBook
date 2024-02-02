<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Recipe $recipe) {
        $data = $request->validate([
            'content' => 'max:500',
        ]);

        $data['user_id'] = auth()->user()->id;
        $data['recipe_id'] = $recipe->id;
        

        Comment::create($data);

        return to_route('recipes.show', $recipe);
    }
}
