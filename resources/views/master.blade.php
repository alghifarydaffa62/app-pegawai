<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Employee Management System')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
    </style>
</head>
<body class="font-sans antialiased">
    <!-- Navbar -->
    <nav class="bg-white shadow-lg">
        <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ url('/dashboard') }}" class="text-2xl font-bold text-purple-600">
                        Employee System
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="flex items-center space-x-4">
                        <a href="{{ url('/admin') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Admin
                        </a>
                        <a href="{{ url('/employees') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Pegawai
                        </a>
                        <a href="{{ url('/position') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Jabatan
                        </a>
                        <a href="{{ url('/department') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Departemen
                        </a>
                        <a href="{{ url('/attendance') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Absensi
                        </a>
                        <a href="{{ url('/salaries') }}" class="px-3 py-2 text-sm font-medium text-gray-700 transition rounded-md hover:bg-purple-100 hover:text-purple-600">
                            Gaji
                        </a>
                        <form action="{{ route('logout') }}" method="POST" class="text-center">
                            @csrf
                            <button type="submit" 
                                class="px-4 py-2 text-white transition bg-red-500 rounded-lg text-md hover:bg-red-600">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="px-4 py-8 mx-auto max-w-7xl sm:px-6 lg:px-8 min-h-[75vh]">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="mt-12 bg-white shadow-lg">
        <div class="px-4 py-6 mx-auto text-center text-gray-600 max-w-7xl">
            <p>&copy; {{ date('Y') }} Employee Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>