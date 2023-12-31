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
        return view('Schools.showSchool', ['schools' => $schools]);
    }
    public function edit(School $schools)
    {
        return view ('schools.edit',compact('schools'));
    }

    public function update(Request $request, School $schools)
    {
        $request->validate([
            'shool_name' => 'required|unique:schools|max:255'
        ]);

        $schools->update($request->all());

        return redirect()->route('schools.index')->with('success', 'School has been updated');
    }
    public function destory(School $schools)
    {
        $schools->delete();

        return redirect()->route('schools.index')->with('success', 'school has been deleted');
    }
}
