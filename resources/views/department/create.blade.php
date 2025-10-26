<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form add Departement</title>
</head>
<body>
    @extends('master')
    @section('title', 'Tambah Departemen')
    @section('content')

    <div class="max-w-2xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Tambah Departemen Baru</h1>
                <p class="mt-1 text-gray-600">Isi form berikut untuk menambahkan departemen</p>
            </div>

            <!-- Form -->
            <form action="{{ route('department.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Departemen -->
                <div>
                    <label for="nama_departemen" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Departemen <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <input type="text" name="nama_departemen" id="nama_departemen" required
                            placeholder="Contoh: IT, Finance, Marketing"
                            class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-yellow-500 focus:border-transparent">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Masukkan nama departemen yang jelas dan deskriptif</p>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 space-x-4 border-t">
                    <a href="{{ route('department.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-yellow-600 rounded-lg shadow-md hover:bg-yellow-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    @endsection
</body>
</html>