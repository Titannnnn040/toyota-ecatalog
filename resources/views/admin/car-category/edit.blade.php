<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4 text-gray-700">
        Form Data Mobil
    </h2>
    <form action="{{route('carCategory.update', ['id' => $category->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium text-gray-700">
                Nama Kategori
            </label>
            <input type="text" name="name" id="name"
                placeholder="Masukkan kategori mobil"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('name') border-red-500 @enderror" value="{{$category->name}}">
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
        $('#price, #dp').on('input', function(){
            // Ambil angka saja
            let value = $(this).val().replace(/\D/g, '');

            // Format dengan separator titik
            let formatted = new Intl.NumberFormat('id-ID').format(value);

            $(this).val(formatted);
        });
    });
</script>
@endsection
