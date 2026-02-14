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
                </tr>
        </tbody>
    </table>

</div>
@endsection
