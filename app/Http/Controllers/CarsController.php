<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\CarCategory;

class CarsController extends Controller
{
    public function index(){
        $cars = Car::All();
        return view('admin.cars.index', compact('cars'));
    }
    public function create(){
        $category = CarCategory::All();
        return view('admin.cars.create', compact('category'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'price' => 'required',
            'dp' => 'required',
            'tenor' => 'required',
            'cicilan' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Upload gambar
        $gambarPath = null;

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('images/car'), $filename);

            $gambarPath = '/public/images/car/'.$filename;
        }
        Car::create([
            'name' => $request->name,
            'slug' => $request->slug,
            'category' => $request->category,
            'price' => str_replace('.', '', $request->price),
            'dp' => str_replace('.', '', $request->dp),
            'cicilan' => str_replace('.', '', $request->cicilan),
            'tenor' => str_replace('.', '', $request->tenor),
            'image' => $gambarPath,
        ]);

        return redirect('admin/cars')->with('success', 'Data mobil berhasil disimpan');
    }
    public function edit($id){
        $cars = Car::find($id);
        $category = CarCategory::All();
        return view('admin.cars.edit', compact('cars', 'category'));
    }
    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required',
            'category' => 'required',
            'price' => 'required',
            'dp' => 'required',
            'tenor' => 'required',
            'cicilan' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data mobil
        $car = Car::findOrFail($id);

        $gambarPath = $car->image; // default pakai gambar lama

        // Jika upload gambar baru
        if ($request->hasFile('image')) {

            // 🔥 Hapus gambar lama
            if ($car->image && file_exists(public_path($car->image))) {
                unlink(public_path($car->image));
            }

            // Upload gambar baru
            $file = $request->file('image');

            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('images/car'), $filename);

            $gambarPath = '/public/images/car/'.$filename;
        }

        // Update data
        $car->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'category' => $request->category,
            'price' => str_replace('.', '', $request->price),
            'dp' => str_replace('.', '', $request->dp),
            'cicilan' => str_replace('.', '', $request->cicilan),
            'tenor' => str_replace('.', '', $request->tenor),
            'image' => $gambarPath,
        ]);

        return redirect('admin/cars')
            ->with('success', 'Data mobil berhasil diubah');
    }
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // Hapus gambar
        if ($car->image && file_exists(public_path($car->image))) {
            unlink(public_path($car->image));
        }

        $car->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data mobil berhasil dihapus'
        ]);
    }
}
