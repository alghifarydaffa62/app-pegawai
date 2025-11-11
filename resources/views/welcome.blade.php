<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Employee Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
    </style>
</head>
<body class="flex items-center justify-center h-screen font-sans antialiased">

<div class="w-full max-w-6xl px-6">
    <!-- Header -->
    <div class="mb-6 text-center">
        <h1 class="mb-2 text-5xl font-bold text-white sm:text-6xl">Employee Management System</h1>
        <p class="text-xl text-white">Kelola data pegawai dengan mudah dan efisien</p>
    </div>

    <div class="grid gap-6 sm:grid-cols-3 lg:grid-cols-3">
         <a href="{{ url('/admin') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-indigo-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Admin</span>
            <span class="text-sm text-gray-600">Manajemen Akun</span>
        </a>
        
        <!-- Employees -->
        <a href="{{ url('/employees') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-blue-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Pegawai</span>
            <span class="text-sm text-gray-600">Data Karyawan</span>
        </a>

        <!-- Salaries -->
        <a href="{{ url('/salaries') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-green-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Gaji</span>
            <span class="text-sm text-gray-600">Penggajian</span>
        </a>

        <!-- Departments -->
        <a href="{{ url('/department') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-yellow-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-yellow-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Departemen</span>
            <span class="text-sm text-gray-600">Divisi</span>
        </a>

        <!-- Positions -->
        <a href="{{ url('/position') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-purple-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Jabatan</span>
            <span class="text-sm text-gray-600">Posisi</span>
        </a>

        <!-- Attendance -->
        <a href="{{ url('/attendance') }}"
            class="flex flex-col items-center justify-center p-8 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:scale-105 hover:shadow-xl">
            <div class="flex items-center justify-center w-12 h-12 mb-3 bg-red-100 rounded-full">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="text-lg font-semibold text-gray-700">Absensi</span>
            <span class="text-sm text-gray-600">Kehadiran</span>
        </a>
    </div>
    
    <form action="{{ route('logout') }}" method="POST" class="mt-6 text-center">
        @csrf
        <button type="submit" 
            class="px-4 py-2 text-white transition bg-red-500 rounded-lg hover:bg-red-600">
            Logout
        </button>
    </form>

    <!-- Footer -->
    <footer class="mt-12 text-sm text-center text-white">
        © {{ date('Y') }} Employee Management System — All Rights Reserved
    </footer>
    </div>
</body>
</html>