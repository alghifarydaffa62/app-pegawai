<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gradient-to-r from-blue-600 to-indigo-600">

    <div class="w-full max-w-md p-8 bg-white shadow-xl rounded-2xl">
        <div class="mb-6 text-center">
            <h1 class="text-3xl font-bold text-gray-800">Sistem Manajemen Karyawan</h1>
            <p class="mt-2 text-sm text-gray-500">Login untuk mengakses dashboard admin</p>
        </div>

        <form action="{{ url('/login') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="admin@example.com">
            </div>

            <div>
                <label class="block mb-1 text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    placeholder="••••••••">
            </div>

            @if ($errors->any())
                <p class="text-sm font-medium text-red-600">{{ $errors->first() }}</p>
            @endif

            <button type="submit"
                class="w-full py-2 font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700">
                Login
            </button>
        </form>

        <div class="mt-6 text-sm text-center text-gray-500">
            &copy; {{ date('Y') }} Sistem Manajemen Karyawan
        </div>
    </div>

</body>
</html>