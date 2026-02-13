<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $assets = Asset::with('project')->latest()->get();
        return view('assets.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('assets.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'project_id' => 'required|exists:projects,id',
            'file' => 'required|file|max:10240', // Max 10MB
        ]);

        if ($request->hasFile('file')) {
            $path = $request->file('file')->store('public/assets');
            
            Asset::create([
                'name' => $request->name,
                'type' => $request->type,
                'project_id' => $request->project_id,
                'file_path' => Storage::url($path), // Save public URL
            ]);

            return redirect()->route('assets.index')
                            ->with('success', 'Asset uploaded successfully.');
        }

        return back()->with('error', 'File upload failed.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Asset $asset)
    {
        return view('assets.show', compact('asset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Asset $asset)
    {
        $projects = Project::all();
        return view('assets.edit', compact('asset', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'project_id' => 'required|exists:projects,id',
        ]);

        // Note: For simplicity, we are not allowing file replacement in edit.
        // Users can delete and re-upload if needed.
        
        $asset->update($request->only(['name', 'type', 'project_id']));

        return redirect()->route('assets.index')
                        ->with('success', 'Asset updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Asset $asset)
    {
        // Convert public URL back to storage path
        // URL: /storage/assets/filename.jpg -> Path: public/assets/filename.jpg
        $path = str_replace('/storage/', 'public/', $asset->file_path);
        
        if (Storage::exists($path)) {
            Storage::delete($path);
        }

        $asset->delete();

        return redirect()->route('assets.index')
                        ->with('success', 'Asset deleted successfully');
    }
}
