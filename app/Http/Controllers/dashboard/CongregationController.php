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
        return view('congregation.edit', compact('congregation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $congregation = Congregation::where('id', $id)->firstOrFail();

        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'gender' => 'required|string',
            'age' => 'required|integer',
            'address' => 'required|string',
        ]);

        $congregation->update($validated);

        return redirect()->route('jemaat.index')
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
