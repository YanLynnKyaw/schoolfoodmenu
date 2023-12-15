<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class FoodmenuController extends Controller
{
    public function index(){
        $softDrinkData = Food::where('category', 'Soft Drink')->get();
        $lunchData = Food::where('category', 'Lunch')->get();
        $breakfastData = Food::where('category', 'Breakfast')->get();
        return view('foodmenupage', compact('softDrinkData', 'lunchData','breakfastData'));
    }
    // public function index(){

    //     $data['getrecord'] = Food::all();
    //     // $newMenuItem = session('new_menu_item');

    //     return view('foodmenupage', $data);
    // }
}
