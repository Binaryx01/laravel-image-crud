<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        $imagePath = $request->file('image')->store('images', 'public');
    
        Item::create([
            'name' => $request->name,
            'image' => $imagePath,
        ]);
    
        return redirect()->route('items.index');


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
        return view('items.edit', compact('item'));
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
    
        if ($request->hasFile('image')) {
            Storage::delete('public/' . $item->image);
            $imagePath = $request->file('image')->store('images', 'public');
            $item->image = $imagePath;
        }
    
        $item->name = $request->name;
        $item->save();
    
        return redirect()->route('items.index');
    }

    public function destroy(Item $item)
    {
        // Delete the file from the storage
        if ($item->image) {
            Storage::delete('public/' . $item->image);
        }
    
        // Delete the database record
        $item->delete();
    
        return redirect()->route('items.index')->with('success', 'Item deleted successfully.');
    }
}