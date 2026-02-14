<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-3">
        <h2 class="font-bold mb-4">Rating</h2>
        <a href="{{route('rating.create')}}" class="bg-red-600 text-white p-2 rounded"><i class="fa fa-plus"></i> Create New</a>
    </div>
    <table class="w-full border">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-2">Action</th>
                <th class="p-2">Name</th>
                <th class="p-2">Asal</th>
                <th class="p-2">Image</th>
                <th class="p-2">Rating</th>
                <th class="p-2">Created At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ratings as $item)
            <tr class="text-center border-b">
                
                <!-- Action -->
                <td class="p-2">
                     <a href="{{route('rating.edit', ["id" => $item->id])}}" class="bg-yellow-300 text-white p-1 px-3 rounded m-2">
                        <i class="fa fa-edit ms-1"></i>
                    </a>
                    <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-delete-rating" data-id="{{$item->id}}">
                        <i class="fa fa-trash"></i>
                    </button>
                    </form>
                </td>

                <!-- Name -->
                <td class="p-2">{{ $item->name }}</td>

                <!-- Asal -->
                <td class="p-2">{{ $item->asal }}</td>

                <!-- Image -->
                <td class="p-2">
                    @if ($item->image) 
                        <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-view-image" data-path="{{$item->image}}"><i class="fa fa-eye"></i></button> 
                    @else
                        -
                    @endif
                </td>

                <!-- Rating -->
                <td class="p-2 text-yellow-400 text-xl">
                    @for($i=1; $i<=5; $i++)
                        @if($i <= $item->rating)
                            ★
                        @else
                            ☆
                        @endif
                    @endfor
                </td>

                <!-- Created At -->
                <td class="p-2">
                    {{ $item->created_at->format('d M Y H:i') }}
                </td>

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
        $('.btn-delete-rating').click(function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: 'Data Rating akan dihapus permanen!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#dc2626',
                cancelButtonColor: '#6b7280',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url: `/admin/rating/delete/${id}`,
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
