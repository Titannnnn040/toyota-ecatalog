<!-- resources/views/admin/dashboard.blade.php -->
@extends('admin.layout')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- CARD 1 -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-gray-500">Total Users</h2>
        <p class="text-3xl font-bold text-red-600">120</p>
    </div>

    <!-- CARD 2 -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-gray-500">Total Orders</h2>
        <p class="text-3xl font-bold text-red-600">75</p>
    </div>

    <!-- CARD 3 -->
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-gray-500">Revenue</h2>
        <p class="text-3xl font-bold text-red-600">Rp 12M</p>
    </div>

</div>

<!-- TABLE -->
<div class="bg-white mt-8 p-6 rounded-xl shadow">

    <h2 class="font-bold mb-4">Recent Activity</h2>

    <table class="w-full border">
        <thead class="bg-red-600 text-white">
            <tr>
                <th class="p-2">User</th>
                <th class="p-2">Action</th>
                <th class="p-2">Date</th>
            </tr>
        </thead>

        <tbody>
            <tr class="text-center border-t">
                <td class="p-2">John</td>
                <td>Login</td>
                <td>Today</td>
            </tr>

            <tr class="text-center border-t">
                <td class="p-2">Sarah</td>
                <td>Order</td>
                <td>Today</td>
            </tr>
        </tbody>
    </table>

</div>

@endsection
