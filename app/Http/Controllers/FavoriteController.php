<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function toggleFavorite(Post $post)
    {
        $user = Auth::user();

        if ($user->favorites()->where('post_id', $post->id)->exists()) {
            $user->favorites()->detach($post->id);
        } else {
            $user->favorites()->attach($post->id);
        }

        return redirect()->back();
    }

    public function index()
    {
        $user = Auth::user();
        $favorites = $user->favorites()->paginate(10);

        return view('favorites-index', compact('favorites'));
    }
}
