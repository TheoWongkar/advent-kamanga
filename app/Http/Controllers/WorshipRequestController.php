<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WorshipRequestController extends Controller
{
    public function index()
    {
        return view('worship-request');
    }
}
