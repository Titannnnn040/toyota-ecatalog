<!-- resources/views/admin/layout.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
	<script src="https://kit.fontawesome.com/c96216a310.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gray-100">

<div class="flex h-screen">
    <!-- SIDEBAR -->
    <aside class="w-64 bg-red-600 text-white flex flex-col">

        <div class="p-6 text-2xl font-bold border-b border-red-500">
            ADMIN PANEL
        </div>

        <nav class="flex-1 p-4 space-y-2">
            <a href="{{route('settings.index')}}"
               class="block py-2 px-4 rounded hover:bg-red-700">
                    Setting
            </a>
            <a href="{{route('cars.index')}}"
               class="block py-2 px-4 rounded hover:bg-red-700">
                    Mobil
            </a>
            <a href="{{route('rating.index')}}"
               class="block py-2 px-4 rounded hover:bg-red-700">
                    Rating
            </a>
            <a href="{{route('carCategory.index')}}"
               class="block py-2 px-4 rounded hover:bg-red-700">
                    Kategori Mobil
            </a>
        </nav>

        <div class="p-4 border-t border-red-500">
            <a href="/admin/logout"
               class="block text-center bg-white text-red-600 py-2 rounded font-semibold hover:bg-gray-200">
               Logout
            </a>
        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="flex-1">

        <!-- TOPBAR -->
        <header class="bg-white shadow p-4 flex justify-between">
            <h1 class="font-bold text-lg">Dashboard</h1>

            <div>
                Welcome, Admin 👋
            </div>
        </header>

        <!-- CONTENT -->
        @if(session('success'))
            <div class="p-6 pb-0">
                <div class="bg-green-100 text-green-700 p-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif
        <div class="p-6">
            @yield('content')
        </div>

    </main>

</div>

</body>
</html>
