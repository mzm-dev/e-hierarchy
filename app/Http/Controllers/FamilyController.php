<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Relationship;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $families = Family::paginate();
        return view('families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //utk data dropdown
        $relationships = Relationship::pluck('name', 'id');

        return view('families.create', compact('relationships'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:families,name',
            'relationship_id' => 'required',
            'dob' => 'nullable',
        ]);


        Family::create($request->all());

        return redirect()->route('families.index')->with('success', 'Family created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Family $family)
    {
        return view('families.edit', compact('family'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|string|unique:families,name,' . $family->id,
            'relation_id' => 'required',
            'dob' => 'nullable|date',
        ]);

        $family->update($request->all());

        return redirect()->route('families.index')->with('success', 'Family updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Family $family)
    {
        $family->delete();

        return redirect()->route('families.index')->with('success', 'Family deleted successfully.');
    }
}
