<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarCategory;

class carCategoryController extends Controller
{
    public function index(){
        $category = CarCategory::All();
        return view('admin.car-category.index', compact('category'));
    }
    public function create(){
        return view('admin.car-category.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        CarCategory::create([
            'name' => $request->name
        ]);

        return redirect()->route('carCategory.index')->with('success', 'Data kategori mobil berhasil disimpan');
    }
    public function edit($id){
        $category = CarCategory::find($id);
        return view('admin.car-category.edit', compact('category'));
    }
    public function update($id, Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        // Ambil data mobil
        $category = CarCategory::findOrFail($id);

        // Update data
        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('carCategory.index')->with('success', 'Data kategori mobil berhasil diubah');
    }
    public function destroy($id)
    {
        $category = CarCategory::findOrFail($id);
        $category->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data kategori mobil berhasil dihapus'
        ]);
    }
}
