<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Post;
use App\Models\Worship;
use App\Models\Congregation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display the dashboard with statistics.
     */
    public function index()
    {
        $totalPosts = Post::count();

        $totalWorship = Worship::count();
        $latestWorship = Worship::latest('title', 'date')->first();

        $totalCongregation = Congregation::count();

        $maleCongregation = Congregation::where('gender', 'Laki-Laki')->count();
        $femaleCongregation = Congregation::where('gender', 'Perempuan')->count();

        // Pass data to the view
        return view('dashboard', [
            'totalPosts' => $totalPosts,
            'totalWorship' => $totalWorship,
            'latestWorship' => $latestWorship,
            'totalCongregation' => $totalCongregation,
            'maleCongregation' => $maleCongregation,
            'femaleCongregation' => $femaleCongregation,
        ]);
    }
}
