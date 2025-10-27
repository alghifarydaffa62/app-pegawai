<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Departement</title>
</head>
<body class="h-screen">
    @extends('master')
    @section('title', 'Detail Departemen')
    @section('content')

    <div class="max-w-3xl mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-indigo-600 to-purple-600">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-16 h-16 mr-4 bg-white rounded-full">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M4 7h16M4 12h16m-7 5h7" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white">Detail Departemen</h1>
                        <p class="mt-1 text-indigo-100">Informasi lengkap mengenai departemen</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- ID Departemen -->
                <div class="p-4 rounded-lg bg-gray-50">
                    <p class="mb-2 text-sm font-semibold text-gray-600">ID Departemen</p>
                    <p class="text-xl font-bold text-gray-800">{{ $department->id }}</p>
                </div>

                <!-- Nama Departemen -->
                <div class="p-4 rounded-lg bg-gray-50">
                    <p class="mb-2 text-sm font-semibold text-gray-600">Nama Departemen</p>
                    <p class="text-xl font-bold text-gray-800">{{ $department->nama_departemen }}</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end pt-6 mt-8 space-x-4 border-t">
                    <a href="{{ route('department.index') }}" 
                       class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Kembali
                    </a>
                    <a href="{{ route('department.edit', $department->id) }}" 
                       class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-indigo-600 rounded-lg shadow-md hover:bg-indigo-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>
                </div>
            </div>
        </div>
    </div>

    @endsection
</body>
</html>