<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canteen;

class CanteenController extends Controller
{
    public function index()
    {
        $canteens = Canteen::all();
        return view('Canteens.showCanteen', ['canteens' => $canteens]);
    }

    public function create()
    {
        return view('Canteens.createCanteen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'canteen_name' => 'required|unique:canteens|max:255',
            // Add other validation rules as needed
        ]);

        Canteen::create([
            'canteen_name' => $request->input('canteen_name'),
            'school_id' => $request->input('school_id')
        ]);

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
            'canteen_name' => 'required|unique:canteens|max:255',
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
