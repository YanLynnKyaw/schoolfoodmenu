<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $schools = School::all();
        return view('testdash', ['schools' => $schools]);
    }
    public function create()
    {
        return view ('Schools.createSchool');
    }
    public function store(Request $request)
    {
        $request->validate([
            'school_name' => 'required|unique:schools|max:255',
        ]);
        School::create($request->all());

        return redirect()->route('schools.index')->with('success', ' School has been created');
    }
    public function show (School $schools)
    {
        return view('Shools.showSchool', compact('school'));
    }
    public function edit(School $schools)
    {
        return view ('schools.edit',compact('school'));
    }

    public function update(Request $request, School $schools)
    {
        $request->validate([
            'shool_name' => 'required|unique:schools|max:255'
        ]);

        $school->update($request->all());

        return redirect()->route('schools.index')->with('success', 'School has been updated');
    }
    public function destory(School $school)
    {
        $school->delete();

        return redirect()->route('schools.index')->with('success', 'school has been deleted');
    }
}
