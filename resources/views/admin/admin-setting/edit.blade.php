<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4 text-gray-700">
        Form Data Mobil
    </h2>
    <form action="{{route('settings.update', ['id' => $data->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="running_text" class="block mb-1 font-medium text-gray-700">
                Running text
            </label>
            <input type="text" name="running_text" id="running_text"
                placeholder=""
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('running_text') border-red-500 @enderror" value="{{$data->running_text}}">
                @error('running_text')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="image" class="block mb-1 font-medium text-gray-700">
                Banner
            </label>
            <button type="button" class="bg-red-600 text-white p-1 px-4 rounded mb-1 btn-view-image" data-path="{{$data->banner}}"><i class="fa fa-eye"></i></button> 
            <input type="file" name="image" id="image"
                placeholder=""
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('image') border-red-500 @enderror" value="{{$data->banner}}">
                @error('image')
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
            href="{{route('settings.index')}}"
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
</script>
@endsection
