<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $posts = Post::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "{$search}%"); // Ganti 'name' dengan kolom yang ingin dicari dari tabel users
                    })
                    ->orWhereHas('category', function ($query) use ($search) {
                        $query->where('category', 'LIKE', "{$search}%"); // Ganti 'name' dengan kolom yang ingin dicari dari tabel users
                    });
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('post.index', [
            'posts' => $posts,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|min:5',
            'category_id' => 'required|integer',
            'image' => 'required|image|file|max:3072',
            'body' => 'required|string',
        ]);

        $validated['image'] = $request->file('image')->store('post-images', 'public');
        $validated['user_id'] = Auth::id();

        Post::create($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        if (!$post) {
            return view('post.index')
                ->with('error', 'Berita tidak ditemukan');
        }

        return view('post.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $categories = Category::all();
        return view('post.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();

        $validated = $request->validate([
            'title' => 'required|string|min:5|',
            'image' => 'nullable|image|file|max:3072',
            'body' => 'required|string',
        ]);

        if ($request->file('image')) {
            $validated['image'] = $request->file('image')->store('post-images');
        }

        $post->update($validated);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
