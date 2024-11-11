<?php

namespace App\Http\Controllers;

use App\Models\Congregation;
use Illuminate\Http\Request;

use function Pest\Laravel\get;

class CongregationController extends Controller
{
    public function index()
    {
        $congregations = Congregation::with('user')
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('congregations', compact('congregations'));
    }
}
