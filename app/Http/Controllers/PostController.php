<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category')
            ->orderBy('created_at', 'DESC')
            ->paginate(15);

        return view('posts', compact('posts'));
    }
}
