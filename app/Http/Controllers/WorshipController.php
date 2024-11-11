<?php

namespace App\Http\Controllers;

use App\Models\Worship;
use Illuminate\Http\Request;

class WorshipController extends Controller
{
    public function index()
    {
        $worships = Worship::with('user')
            ->orderBy('date', 'DESC')
            ->paginate(15);
        return view('worships', compact('worships'));
    }
}
