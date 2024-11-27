<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Education;

class EducationController extends Controller
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
        $educations = Education::all();
        return view('education.index')->with('educations', $educations);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('education.create');
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

        Education::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);

        return redirect()->route('education.index')->with('success', 'Education fields created successfully!');
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
        $education = Education::findOrFail($id);

        return view('education.edit', compact('education'));
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
    
        $education = Education::findOrFail($id);
        $education->update($validated);
    
        return redirect()->route('education.index')->with('success', 'Education updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $education = Education::findOrFail($id);
        $education->delete();

        return redirect()->route('education.index')->with('success', 'Education deleted successfully!');
    }
}
