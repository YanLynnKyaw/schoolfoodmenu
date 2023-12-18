<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        $data = Food::latest()->paginate(5);

        return view ('testdash', compact('data'))->with('i', (request()->input('page',1) - 1)*5);
    }*/
    public function index()
    {
        $softDrinkData = Food::where('category', 'Soft Drink')->get();
        $lunchData = Food::where('category', 'Lunch')->get();
        $breakfastData = Food::where('category', 'Breakfast')->get();
        $data = Food::latest()->paginate(5);
    
        return view('testdash', compact('softDrinkData', 'lunchData', 'breakfastData','data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        if(auth()->user()->can('ed_de')){

        
        $request->validate([
            'food_menu'     =>  'required',
            'food_price'    =>  'required'
            
        ]);
        $food = new Food;
        $food->food_menu    =   $request->food_menu;
        $food->food_price   =   $request->food_price;
        $food->category = $request->category;
        

        $food->save();

        // session()->flash('new_menu_item', $food);
        // Log::info('Data added: ' . $food); 
        
        return redirect()->route('food.index')->with('success', 'Food Menu has been added');
        }
        return abort (403);
    }

    /**
     * Display the specified resource.
     */
    public function show(Food $food)
    {
        return view('show', compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Food $food)
    {
        return view('edit', compact('food'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'food_menu'     =>  'required',
            'food_price'    =>  'required',
            'category'      => 'required'
        ]);

        $food = Food::find($request->hidden_id);
        $food->food_menu = $request->food_menu;
        $food->food_price = $request->food_price;
        // $food->category = $request->category; 
        if ($request->has('category')) {
            $food->category = $request->category; // Conditional assignment of category field
        }
        $food->save();

        return redirect()->route('food.index')->with('success','A Menu has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Food $food)
    {
        $food->delete();
        return redirect()->route('food.index')->with('success','A Menu has been deleted successfully');
    }
}
