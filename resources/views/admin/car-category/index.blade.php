<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')
<!-- TABLE -->
<div class="bg-white p-6 rounded-xl shadow">
    <div class="flex justify-between items-center mb-3">
        <h2 class="font-bold mb-4">Kategori Mobil</h2>
        <a href="{{route('carCategory.create')}}" class="bg-red-600 text-white p-2 rounded"><i class="fa fa-plus"></i> Create New</a>
    </div>
    <table class="w-full border">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-2 w-[3cm]">Action</th>
                <th class="p-2">Kategori</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach ($category as $item)
                <tr class="text-center my-2 border border-3">
                    <td>
                        <a href="{{route('carCategory.edit', ["id" => $item->id])}}" class="bg-yellow-300 text-white p-1 px-3 rounded m-2">
                            <i class="fa fa-edit ms-1"></i>
                        </a>
                        <button class="bg-red-600 text-white p-1 px-4 rounded my-2 btn-delete-car" data-id="{{$item->id}}">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                    <td>{{$item->name}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>
<script>
    $(document).ready(function(){
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
                        url: `/admin/car-category/delete/${id}`,
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
