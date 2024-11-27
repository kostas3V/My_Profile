<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Resume;
use Illuminate\Support\Facades\Storage;



class Resumecontroller extends Controller
{   
    public function __construct()
    {
        // Apply the 'admin' middleware to all methods except 'index'
        $this->middleware('admin')->except(['index', 'download']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resume = Resume::latest()->first();
        return view('resume.index', compact('resume'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resume.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'resume' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $file = $request->file('resume');
        $path = $file->store('resumes', 'public');

        Resume::create([
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
        ]);

        return redirect()->back()->with('success', 'Resume uploaded successfully!');
    }

    public function download($id)
    {
        $resume = Resume::findOrFail($id);

        /** @var \Illuminate\Filesystem\FilesystemAdapter $storage */
        $storage = Storage::disk('public');
        
        return $storage->download($resume->file_path);
        //return Storage::disk('public')->download($resume->file_path);
       
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
