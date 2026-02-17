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
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data mobil
        $find = Home::findOrFail($id);

        // Update data
        

        $gambarPath = $find->banner; // default pakai gambar lama

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // 🔥 Hapus gambar lama
            if ($find->banner && file_exists(public_path($find->banner))) {
                unlink(public_path($find->banner));
            }

            // Upload gambar baru
            $file = $request->file('image');

            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('images'), $filename);

            $gambarPath = '/public/images/'.$filename;
        }
        $find->update([
            'running_text' => $request->running_text,
            'banner'       => $gambarPath,

        ]);
        return redirect()->route('settings.index')->with('success', 'Data berhasil diubah');
    }
}
