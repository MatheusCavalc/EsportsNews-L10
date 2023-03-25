<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Inertia\Inertia;

class HomeController extends Controller
{
    public function index()
    {
        return Inertia::render('Client/Index', [
            'reports' => Report::orderBy('id', 'desc')->get()
        ]);
    }

    public function showNews($id, $slug)
    {
        return Inertia::render('Client/News', [
            'report' => Report::where('id', $id)->first()
        ]);
    }
}
