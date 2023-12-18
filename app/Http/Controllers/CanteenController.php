<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Canteen;
use App\Models\Category;
use App\Models\School;

class CanteenController extends Controller
{
    public function index(Request $request)
    {
        $canteens = Canteen::all();
        $school = School::find($request->sch_id);

        return view('Canteens.showCanteen', ['canteens' => $canteens])
            ->with('sch_id', $request->id);
    }

    public function create($id)
    {
        $schools = School::all();
        return view('Canteens.createCanteen', [
            'schools' => $schools,
            'current_school' => $id
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'canteen_name' => 'required|unique:canteens|max:255',
            'school_id' => 'required'
        ]);

        // $create = Canteen::create([
        //     'canteen_name' => $request->canteen_name
        // ]);
        $canteen = new Canteen();
        $canteen->canteen_name = $request->canteen_name;
        $canteen->school_id = $request->school_id;
        $canteen->save();

        return redirect('canteens/'.$request->school_id)->with('success', 'Canteen has been created');
    }

    public function show($id)
    {
        $schools = School::all();
        $canteens = Canteen::where('school_id', $id)->get();
        // $category = Category::find()

        return view('Canteens.showCanteen', [
            'canteens' => $canteens,
            'schools' => $schools,
            'current_school' => $id
        ]);
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
