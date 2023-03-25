<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreReportRequest;
use App\Http\Requests\UpdateReportRequest;
use App\Models\Report;
use Illuminate\Support\Str;
use Inertia\Inertia;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Inertia::render('Admin/Reports/Index', [
            'reports' => Report::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Admin/Reports/Create', [
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReportRequest $request)
    {
        $data = $request->all();

        $slug = Str::slug($request->get('title'), '-');
        $data['slug'] = $slug;

        $image_slug = Str::slug($request->get('description'), '-');
        $image = $request->file('image');
        $image_name = time() . $image_slug . '.' . $image->getClientOriginalExtension();
        $request->image->move(public_path('storage/image'), $image_name);
        $data['image'] = $image_name;

        Report::create($data);

        return to_route('reports.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        return Inertia::render('Admin/Reports/Edit', [
            'report' => $report
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReportRequest $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        //
    }

    public function uploadImage(Request $request)
    {
        $request->validate([
            'image' => 'required'
        ]);

        $picName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('storage/image'), $picName);
        return response()->json([
            "success" => 1,
            "file" => [
                "url" => "http://localhost/storage/image/$picName"
            ]
        ]);
    }
}
