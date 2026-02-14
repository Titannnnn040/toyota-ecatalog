<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rating;

class RatingController extends Controller
{
    public function index(){
        $ratings = Rating::latest()->get();
        return view('admin.rating.index', compact('ratings'));
    }
    public function create(){
        return view('admin.rating.create');
    }
    public function store(Request $request){
        $request->validate([
            'name'   => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image'  => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);


        // Upload gambar
        $gambarPath = null;

        
        if ($request->hasFile('image')) {
            $file = $request->file('image');

            $filename = time().'_'.$file->getClientOriginalName();

            $file->move(public_path('images/rating'), $filename);

            $gambarPath = '/public/images/rating/'.$filename;
        }
        Rating::create([
            'name'   => $request->name,
            'asal'   => $request->asal,
            'rating' => $request->rating,
            'image'  => $gambarPath,
        ]);

        return redirect()
            ->route('rating.index')
            ->with('success', 'Data rating berhasil disimpan');
    }
    public function edit($id){
        $rating = Rating::find($id);
        return view('admin.rating.edit', compact('rating'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required',
            'asal'   => 'required',
            'rating' => 'required|integer|min:1|max:5',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Ambil data rating
        $rating = Rating::findOrFail($id);

        $gambarPath = $rating->image; // default gambar lama

        // Upload gambar baru
        if ($request->hasFile('image')) {

            // Hapus gambar lama
            if ($rating->image && file_exists(public_path($rating->image))) {
                unlink(public_path($rating->image));
            }

            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images/rating'), $filename);

            $gambarPath = '/public/images/rating/'.$filename;
        }

        // Update data
        $rating->update([
            'name'   => $request->name,
            'asal'   => $request->asal,
            'rating' => $request->rating,
            'image'  => $gambarPath,
        ]);

        return redirect()
            ->route('rating.index')
            ->with('success', 'Data rating berhasil diubah');
    }
    public function destroy($id)
    {
        $rating = Rating::findOrFail($id);

        // Hapus gambar
        if ($rating->image && file_exists(public_path($rating->image))) {
            unlink(public_path($rating->image));
        }

        $rating->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data mobil berhasil dihapus'
        ]);
    }
}
