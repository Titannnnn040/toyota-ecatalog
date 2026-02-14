<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<div class="bg-white p-6 rounded-xl shadow">

    <h2 class="text-xl font-bold mb-4 text-gray-700">
        Form Data Rating
    </h2>
    <form action="{{route('rating.update', ["id" => $rating->id])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!-- Nama Mobil -->
        <div class="mb-4">
            <label class="block mb-1 font-medium text-gray-700">Rating</label>
            <!-- Star Rating -->
            <div class="flex space-x-2 text-3xl cursor-pointer" id="starRating">
                <span data-value="1">☆</span>
                <span data-value="2">☆</span>
                <span data-value="3">☆</span>
                <span data-value="4">☆</span>
                <span data-value="5">☆</span>
            </div>
            <input type="hidden" name="rating" id="ratingValue" value="{{$rating->rating}}">
        </div>

        <div class="mb-4">
            <label for="name" class="block mb-1 font-medium text-gray-700">
                Nama
            </label>
            <input type="text" name="name" id="name"
                placeholder="Masukkan Nama Pembeli"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('name') border-red-500 @enderror" value="{{$rating->name}}">
                @error('name')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
    
        <!-- Merek -->
        <div class="mb-4">
            <label for="image" class="block mb-1 font-medium text-gray-700">
                Gambar
            </label>
             @if ($rating->image) 
                <button type="button" class="bg-red-600 text-white p-1 px-4 rounded mb-1 btn-view-image" data-path="{{$rating->image}}"><i class="fa fa-eye"></i></button> 
            @endif
            <input type="file" name="image" id="image"
                placeholder="Contoh: Hybrid GR"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('image') border-red-500 @enderror" value="{{$rating->image}}">
                @error('image')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="mb-4">
            <label for="asal" class="block mb-1 font-medium text-gray-700">
                Asal
            </label>
            <input type="text" name="asal" id="asal"
                placeholder="Contoh : Dari Jakarta"
                class="w-full border rounded-lg p-3 focus:ring-2 focus:ring-red-600 focus:outline-none @error('asal') border-red-500 @enderror" value="{{$rating->asal}}">
                @error('asal')
                    <div class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </div>
                @enderror
        </div>
        <button
            type="submit"
            class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold">
            Simpan Data
        </button>
        <a
            href="{{route('rating.index')}}"
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
    $('#price, #dp').on('input', function(){
        // Ambil angka saja
        let value = $(this).val().replace(/\D/g, '');

        // Format dengan separator titik
        let formatted = new Intl.NumberFormat('id-ID').format(value);

        $(this).val(formatted);
    });
    $(document).ready(function(){

       let currentRating = {{ $rating->rating ?? 0 }};
        function setStars(rating) {
            $('#starRating span').each(function () {
                if ($(this).data('value') <= rating) {
                    $(this).text('★').addClass('text-yellow-400');
                } else {
                    $(this).text('☆').removeClass('text-yellow-400');
                }
            });
        }

        setStars(currentRating);

        $('#starRating span').click(function () {
            let value = $(this).data('value');
            $('#ratingValue').val(value);
            setStars(value);
        });


    });
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
    });
</script>

@endsection
