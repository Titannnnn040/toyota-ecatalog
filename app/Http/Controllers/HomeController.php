<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Rating;
use App\Models\CarCategory;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Get all cars, ordered by newest first

        $cars = Car::all();
        $category = CarCategory::All();
        $ratings = Rating::latest()->get();
        $home = Home::first();
        return view('layouts.app', compact('cars', 'ratings', 'category', 'home'));
    }

    public function indexAdmin(){
        $data = Home::first();
        return view('admin.admin-setting.index', compact('data'));
    }
    public function editAdmin($id){
        $data = Home::first();
        return view('admin.admin-setting.edit', compact('data'));
    }
    public function updateAdmin($id, Request $request){
        $request->validate([
            'running_text' => 'required',
        ]);

        // Ambil data mobil
        $find = Home::findOrFail($id);

        // Update data
        $find->update([
            'running_text' => $request->running_text,
        ]);

        return redirect()->route('settings.index')->with('success', 'Data berhasil diubah');
    }
}
