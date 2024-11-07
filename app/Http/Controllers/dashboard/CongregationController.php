<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Congregation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CongregationController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        $congregations = Congregation::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('user', function ($query) use ($search) {
                        $query->where('name', 'LIKE', "{$search}%");
                    })
                    ->orWhere('gender', 'LIKE', "%{$search}%")
                    ->orWhere('age', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('congregation.index', [
            'congregations' => $congregations,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('congregation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
        ]);

        $validated['user_id'] = Auth::id();

        Congregation::create($validated);

        return redirect()->route('jemaat.index')
            ->with('success', 'Jemaat berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $congregation = Congregation::where('id', $id)->firstOrFail();
        return view('post.edit', [
            'congregation' => $congregation,
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
            ->with('success', 'Jemaat berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $congregation = Congregation::where('id', $id);
        $congregation->delete();

        return redirect()->route('jemaat.index')->with('success', 'Jemaat berhasil dihapus.');
    }
}
