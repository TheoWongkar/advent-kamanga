<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Worship;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::with('user', 'category')
            ->orderBy('created_at', 'DESC');

        $worship = Worship::orderBy('date', 'desc')->first();

        return view('home', compact('worship', 'posts'));
    }
}
