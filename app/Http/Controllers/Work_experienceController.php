<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work_experience;

class Work_experienceController extends Controller
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
        $work_experiences = Work_experience::all();
        return view('work_experiences.index')->with('work_experiences', $work_experiences);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('work_experiences.create');
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

        Work_experience::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('work_experiences.index')->with('success', 'Work experience field created successfully!');
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
        $work_experiences = Work_experience::findOrFail($id);

        return view('work_experiences.edit', compact('work_experiences'));
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
    
        $work_experiences = Work_experience::findOrFail($id);
        $work_experiences->update($validated);
    
        return redirect()->route('work_experiences.index')->with('success', 'work experience updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $work_experiences = Work_experience::findOrFail($id);
        $work_experiences->delete();

        return redirect()->route('work_experiences.index')->with('success', 'work experience deleted successfully!');
    }
}
