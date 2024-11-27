<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function __construct()
    {
        // Apply the 'admin' middleware to all methods except 'index'
        $this->middleware('admin')->except('index');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('projects.index')->with('projects', $projects);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',    
        ]);

        Project::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('projects.index')->with('success', 'Project fields created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);

        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
    
        $projects = Project::findOrFail($id);
        $projects->update($validated);
    
        return redirect()->route('projects.index')->with('success', 'Project updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }
}
