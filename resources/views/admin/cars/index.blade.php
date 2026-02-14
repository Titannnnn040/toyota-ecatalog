<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-3">
        <h2 class="font-bold mb-4">Cars</h2>
        <a href="{{route('cars.create')}}" class="bg-red-600 text-white p-2 rounded"><i class="fa fa-plus"></i> Create New</a>
    </div>
    <table class="w-full border">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-2">Action</th>
                <th class="p-2">Kategori</th>
                <th class="p-2">Nama Mobil</th>
                <th class="p-2">Harga</th>
                <th class="p-2">DP</th>
                <th class="p-2">Image</th>
                <th class="p-2">Created At</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($cars as $item)
                <tr class="text-center my-2 border border-3">
                    <td>
                        <a href="{{route('cars.edit', ["id" => $item->id])}}" class="bg-yellow-300 text-white p-1 px-3 rounded m-2">
                            <i class="fa fa-edit ms-1"></i>
                        </a>
                        <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-delete-car" data-id="{{$item->id}}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <td>{{$item->category}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{number_format($item->price, 0, ',', '.')}}</td>
                    <td>{{number_format($item->dp, 0, ',', '.')}}</td>
                    <td>
                        @if ($item->image) 
                        <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-view-image" data-path="{{$item->image}}"><i class="fa fa-eye"></i></button> 
                        @else
                        -
                        @endif
                    </td>
                    <td>{{$item->created_at}}</td>
                </tr>
            @endforeach
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
        $('.btn-delete-car').click(function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data mobil akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: `/admin/cars/delete/${id}`,
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function (res) {
                            Swal.fire(
                                'Berhasil!',
                                res.message,
                                'success'
                            ).then(() => {
                                location.reload();
                            });
                        },
                        error: function () {
                            Swal.fire(
                                'Gagal!',
                                'Data gagal dihapus',
                                'error'
                            );
                        }
                    });

                }
            });
        });

    });
</script>

@endsection
