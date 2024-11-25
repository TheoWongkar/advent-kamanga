<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Worship;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WorshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        $worships = Worship::with('user')
            ->when($search, function ($query, $search) {
                return $query->where('title', 'LIKE', "%{$search}%")
                    ->orWhere('address', 'LIKE', "%{$search}%");
            })
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('worship.index', [
            'worships' => $worships,
            'search' => $search,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('worship.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category' => 'required|string',
            'preacher' => 'required|string',
            'singer' => 'string',
            'place' => 'required|string',
            'date' => 'required',
        ]);

        $validated['user_id'] = Auth::id();

        Worship::create($validated);

        return redirect()->route('ibadah.index')
            ->with('success', 'Ibadah berhasil dibuat.');
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
        $worship = Worship::where('id', $id)->firstOrFail();
        return view('worship.edit', [
            'worship' => $worship,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $worship = Worship::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'category' => 'required|string|min:5',
            'preacher' => 'required|string',
            'singer' => 'string',
            'place' => 'required|string',
            'date' => 'required',
        ]);

        $worship->update($validated);

        return redirect()->route('ibadah.index')
            ->with('success', 'Ibadah berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $worship = Worship::where('id', $id);
        $worship->delete();

        return redirect()->route('ibadah.index')->with('success', 'Ibadah berhasil dihapus.');
    }
}
