<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Project;
use Illuminate\Http\Request;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bugs = Bug::with('project')->latest()->get();
        return view('bugs.index', compact('bugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('bugs.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required|exists:projects,id',
            'severity' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        Bug::create($request->all());

        return redirect()->route('bugs.index')
                        ->with('success', 'Bug report submitted successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bug $bug)
    {
        return view('bugs.show', compact('bug'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bug $bug)
    {
        $projects = Project::all();
        return view('bugs.edit', compact('bug', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bug $bug)
    {
        $request->validate([
            'title' => 'required',
            'project_id' => 'required|exists:projects,id',
            'severity' => 'required',
            'status' => 'required',
            'description' => 'required',
        ]);

        $bug->update($request->all());

        return redirect()->route('bugs.index')
                        ->with('success', 'Bug report updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bug $bug)
    {
        $bug->delete();

        return redirect()->route('bugs.index')
                        ->with('success', 'Bug report deleted successfully');
    }
}
