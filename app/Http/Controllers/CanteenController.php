<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CanteenController extends Controller
{
    public function index()
    {
        $canteens = Canteen::all();
        return view('Canteens.shwoCanteen', ['canteens' => $canteens]);
    }

    public function create()
    {
        return view('canteens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:canteens|max:255',
            // Add other validation rules as needed
        ]);

        Canteen::create($request->all());

        return redirect()->route('canteens.index')->with('success', 'Canteen has been created');
    }

    public function show(Canteen $canteen)
    {
        return view('canteens.show', ['canteen' => $canteen]);
    }

    public function edit(Canteen $canteen)
    {
        return view('canteens.edit', compact('canteen'));
    }

    public function update(Request $request, Canteen $canteen)
    {
        $request->validate([
            'name' => 'required|unique:canteens|max:255',
            // Add other validation rules as needed
        ]);

        $canteen->update($request->all());

        return redirect()->route('canteens.index')->with('success', 'Canteen has been updated');
    }

    public function destroy(Canteen $canteen)
    {
        $canteen->delete();

        return redirect()->route('canteens.index')->with('success', 'Canteen has been deleted');
    }
}
