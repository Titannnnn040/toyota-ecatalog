<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4 text-gray-700">
        Form Data Mobil
    </h2>
    <form action="{{route('cars.update', ['id' => $cars->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nama Mobil -->
        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium text-gray-700">
                Nama Mobil
            </label>
            <input type="text" name="name" id="name"
                placeholder="Masukkan nama mobil"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('name') border-red-500 @enderror" value="{{$cars->name}}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    
        <!-- Merek -->
        <div class="mb-4">
            <label for="image" class="block font-medium text-gray-700">
                Gambar
            </label>
            @if ($cars->image) 
                <button type="button" class="bg-red-600 text-white p-1 px-4 rounded mb-1 btn-view-image" data-path="{{$cars->image}}"><i class="fa fa-eye"></i></button> 
            @endif
            <input type="file" name="image" id="image"
                placeholder="Contoh: Hybrid GR"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('image') border-red-500 @enderror" value="{{$cars->image}}">
                @error('image')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="slug" class="block mb-1 font-medium text-gray-700">
                Slug
            </label>
            <input type="text" name="slug" id="slug"
                placeholder="Contoh: Hybrid GR"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('slug') border-red-500 @enderror" value="{{$cars->slug}}">
                @error('slug')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="category" class="block mb-1 font-medium text-gray-700">
                Kategori
            </label>
            <select name="category" id="category" class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('category') border-red-500 @enderror">
                <option value="">-- Please Select --</option>
                @foreach ($category as $item)
                    <option value="{{$item->name}}" {{$cars->category == $item->name ? 'selected' : ''}}>{{$item->name}}</option>
                @endforeach
            </select>
            @error('category')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    
        <!-- Tahun -->
        <div class="mb-4">
            <label for="price" class="block mb-1 font-medium text-gray-700">
                Harga
            </label>
            <input type="text" name="price" id="price"
                placeholder="100.000.000"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('price') border-red-500 @enderror" value="{{number_format($cars->price, 0, ',', '.') }}">
                @error('price')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    
        <!-- Harga -->
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700" for="dp">
                DP
            </label>
            <input type="text" name="dp" id="dp"
                placeholder="10.000.000"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('dp') border-red-500 @enderror" value="{{number_format($cars->dp, 0, ',', '.') }}">
                @error('dp')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700" for="dp">
                Tenor (Bulan)
            </label>
            <input type="text" name="tenor" id="tenor"
                placeholder="10"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('tenor') border-red-500 @enderror" value="{{number_format($cars->tenor, 0, ',', '.') }}">
                @error('tenor')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700" for="cicilan">
                Cicilan
            </label>
            <input type="text" name="cicilan" id="cicilan"
                placeholder="10.000.000"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('cicilan') border-red-500 @enderror" value="{{number_format($cars->cicilan, 0, ',', '.') }}">
                @error('cicilan')
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
            href="{{route('cars.index')}}"
            class="border border-red-600 text-red-600 px-6 py-3 rounded-lg font-semibold">
            Cancel
        </a>
    </form>

</div>

<div id="imageModal" 
     class="fixed inset-0 bg-black bg-opacity-50 hidden justify-center items-center z-50">

    <div class="bg-white p-4 rounded-lg shadow-lg relative max-w-lg">

        <!-- Close Button -->
        <button id="closeModal"
            class="absolute top-2 right-2 text-gray-600 hover:text-red-600 text-xl">
            ✕
        </button>

        <!-- Image -->
        <img id="modalImage" src="" 
             class="max-h-[500px] rounded-lg">
    </div>
</div>
<script>
     $(document).ready(function(){
        // Klik tombol eye
        $('.btn-view-image').click(function(){

            let imagePath = $(this).data('path');

            $('#modalImage').attr('src', imagePath);

            $('#imageModal')
                .removeClass('hidden')
                .addClass('flex');
        });

        // Close tombol X
        $('#closeModal').click(function(){
            $('#imageModal').addClass('hidden');
        });

        // Klik luar modal
        $('#imageModal').click(function(e){
            if(e.target.id === 'imageModal'){
                $(this).addClass('hidden');
            }
        });
        $('#price, #dp, #tenor, #cicilan').on('input', function(){
            // Ambil angka saja
            let value = $(this).val().replace(/\D/g, '');

            // Format dengan separator titik
            let formatted = new Intl.NumberFormat('id-ID').format(value);

            $(this).val(formatted);
        });
    });
</script>
@endsection
