<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-3">
        <h2 class="font-bold mb-4">Home Setting</h2>
    </div>
    <table class="w-full border">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-2 w-[3cm]">Action</th>
                <th class="p-2">Running Text</th>
                <th class="p-2">Banner</th>
            </tr>
        </thead>
        <tbody>
                <tr class="text-center my-2 m-5 border border-3">
                    <td>
                        <div class="py-3">
                            <a href="{{route('settings.edit', ["id" => $data->id])}}" class="bg-yellow-300 text-white p-1 px-3 rounded m-2">
                                <i class="fa fa-edit ms-1"></i>
                            </a>
                        </div>
                    </td>
                    <td>{{$data->running_text}}</td>
                    <td>
                        @if ($data->banner) 
                            <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-view-image" data-path="{{$data->banner}}"><i class="fa fa-eye"></i></button> 
                        @else
                        -
                        @endif
                    </td>
                </tr>
        </tbody>
    </table>
</div>

<!-- IMAGE MODAL -->
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
