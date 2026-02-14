<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4 text-gray-700">
        Form Data Kategori Mobil
    </h2>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- Nama Mobil -->
        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium text-gray-700">
                Nama Kategori
            </label>
            <input type="text" name="name" id="name"
                placeholder="Masukkan kategori mobil"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('name') border-red-500 @enderror" value="{{old('name')}}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    
        <!-- Tombol -->
        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold">
            Simpan Data
        </button>
        <a
            href="{{route('carCategory.index')}}"
            class="border border-red-600 text-red-600 px-6 py-3 rounded-lg font-semibold">
            Cancel
        </a>
    </form>

</div>
@endsection
