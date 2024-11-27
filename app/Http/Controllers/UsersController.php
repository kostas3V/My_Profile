<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UsersController extends Controller
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
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
           'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:4096', 
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/image', uniqid() . '.' .  $image->getClientOriginalExtension());

            return back()->with('success', 'Image uploaded successfully!')->with('imagePath', $imagePath);
        }
       
        return back()->with('error', 'Failed to upload image.');
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
        // Find the user by ID
        $user = User::findOrFail($id);

        // Return the edit view with the user data
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validate the new image input
        $request->validate([
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:4096',
        ]);
    
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($user->image) {
                Storage::delete($user->image); // Assuming 'image' stores the file path
            }
    
            // Upload the new image
            $image = $request->file('image');
            $imagePath = $image->storeAs('public/image', uniqid() . '.' . $image->getClientOriginalExtension());
    
            // Update the user's image path in the database
            $user->image = $imagePath;
        }
    
        // Save any other updates to the user
        $user->save();
    
        return back()->with('success', 'User image updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
