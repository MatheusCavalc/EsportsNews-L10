<?php

namespace App\Http\Controllers;

use App\Models\Comment;
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

    public function showNews($id)
    {
        return Inertia::render('Client/News', [
            'report' => Report::with('author')->where('id', $id)->first(),
            'comments' => Comment::with('user')->where('report_id', $id)->get()
        ]);
    }
}
