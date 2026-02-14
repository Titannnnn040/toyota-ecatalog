<!-- resources/views/admin/login.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-red-50 flex items-center justify-center h-screen">

<div class="bg-white p-8 rounded-xl shadow-lg w-96">
    <h2 class="text-3xl font-bold text-center text-red-600 mb-6">
        Admin Login
    </h2>

    @if(session('error'))
        <div class="bg-red-100 text-red-600 p-2 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    <form method="POST" action="/admin/login">
        @csrf

        <input type="username" name="username" placeholder="username"
            class="w-full p-3 border rounded mb-4 focus:ring-2 focus:ring-red-600">

        <input type="password" name="password" placeholder="Password"
            class="w-full p-3 border rounded mb-4 focus:ring-2 focus:ring-red-600">

        <button
            class="w-full bg-red-600 hover:bg-red-700 text-white p-3 rounded font-semibold">
            Login
        </button>
    </form>
</div>

</body>
</html>
