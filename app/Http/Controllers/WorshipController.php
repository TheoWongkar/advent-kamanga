<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorshipController extends Controller
{
    public function index()
    {
        return view('worship');
    }
}
