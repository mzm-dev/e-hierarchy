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
        $families = Family::all();

        return view('families.create', compact('relationships', 'families'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:families,name',
            'parent_id' => 'nullable|exists:families,id',
            'relationship_id' => 'required',
            'dob' => 'nullable',
        ]);


        Family::create($request->all());

        return redirect()->route('families.index')->with('success', 'Family created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function show(Family $family)
    {
        return view('families.show', compact('family'));
    }
    public function edit(Family $family)
    {
        $relationships = Relationship::pluck('name', 'id');
        $families = Family::where('id', '!=', $family->id)->get();
        return view('families.edit', compact('family', 'relationships', 'families'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Family $family)
    {
        $request->validate([
            'name' => 'required|string|unique:families,name,' . $family->id,
            'parent_id' => 'nullable|exists:families,id',
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
