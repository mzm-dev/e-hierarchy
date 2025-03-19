<?php

namespace App\Http\Controllers;

use App\Models\Relationship;
use Illuminate\Http\Request;

class RelationshipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $relationships = Relationship::paginate();
        return view('relationships.index', compact('relationships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('relationships.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:relationships,name',
        ]);

        Relationship::create($request->all());

        return redirect()->route('relationships.index')->with('success', 'Relationship created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Relationship $relationship)
    {
        return view('relationships.edit', compact('relationship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Relationship $relationship)
    {
        $request->validate([
            'name' => 'required|string|unique:relationships,name,' . $relationship->id,
        ]);

        $relationship->update($request->all());

        return redirect()->route('relationships.index')->with('success', 'Relationship updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Relationship $relationship)
    {
        $relationship->delete();

        return redirect()->route('relationships.index')->with('success', 'Relationship deleted successfully.');
    }
}
