<?php

namespace App\Http\Controllers;

use App\Models\Developer;
use App\Models\Project;
use Illuminate\Http\Request;

class DeveloperController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $developers = Developer::withCount('projects')->latest()->get();
        return view('developers.index', compact('developers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('developers.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'projects' => 'array', // Array of project IDs
        ]);

        $developer = Developer::create($request->only(['name', 'role']));

        if ($request->has('projects')) {
            $developer->projects()->sync($request->projects);
        }

        return redirect()->route('developers.index')
                        ->with('success', 'Developer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Developer $developer)
    {
        $developer->load('projects');
        return view('developers.show', compact('developer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Developer $developer)
    {
        $projects = Project::all();
        $developer->load('projects');
        return view('developers.edit', compact('developer', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Developer $developer)
    {
        $request->validate([
            'name' => 'required',
            'role' => 'required',
            'projects' => 'array',
        ]);

        $developer->update($request->only(['name', 'role']));

        if ($request->has('projects')) {
            $developer->projects()->sync($request->projects);
        } else {
            $developer->projects()->detach();
        }

        return redirect()->route('developers.index')
                        ->with('success', 'Developer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Developer $developer)
    {
        $developer->delete();

        return redirect()->route('developers.index')
                        ->with('success', 'Developer deleted successfully');
    }
}
