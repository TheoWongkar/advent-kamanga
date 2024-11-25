<?php

namespace App\Http\Controllers;

use App\Models\Worship;
use Illuminate\Http\Request;

class WorshipRequestController extends Controller
{
    public function index()
    {
        return view('worship-request');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:5',
            'category' => 'required|string',
            'place' => 'required|string|min:5',
            'date' => 'required',
        ]);

        Worship::create($validated);

        return redirect()->back()
            ->with('success', 'Ibadah berhasil diajukan.');
    }
}
