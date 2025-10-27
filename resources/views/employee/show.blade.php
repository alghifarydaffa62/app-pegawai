<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pegawai</title>
</head>
<body>
    @extends('master')
    @section('title', 'Detail Pegawai')
    @section('content')

    <div class="max-w-4xl mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-purple-600 to-indigo-600">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-20 h-20 mr-4 bg-white rounded-full">
                            <svg class="w-10 h-10 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white">{{ $employee->nama_lengkap }}</h1>
                            <p class="mt-1 text-purple-100">Detail Informasi Pegawai</p>
                        </div>
                    </div>
                    @if($employee->status == 'aktif')
                        <span class="px-4 py-2 text-sm font-bold text-white bg-green-500 rounded-full">AKTIF</span>
                    @else
                        <span class="px-4 py-2 text-sm font-bold text-white bg-red-500 rounded-full">NONAKTIF</span>
                    @endif
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <!-- Informasi Pribadi -->
                    <div class="space-y-4">
                        <h2 class="flex items-center mb-4 text-xl font-bold text-gray-800">
                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Pribadi
                        </h2>
                        
                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Email</p>
                            <p class="mt-1 text-gray-800">{{ $employee->email }}</p>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Nomor Telepon</p>
                            <p class="mt-1 text-gray-800">{{ $employee->nomor_telepon }}</p>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Tanggal Lahir</p>
                            <p class="mt-1 text-gray-800">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d F Y') }}</p>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Alamat</p>
                            <p class="mt-1 text-gray-800">{{ $employee->alamat }}</p>
                        </div>
                    </div>

                    <!-- Informasi Pekerjaan -->
                    <div class="space-y-4">
                        <h2 class="flex items-center mb-4 text-xl font-bold text-gray-800">
                            <svg class="w-6 h-6 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                            Informasi Pekerjaan
                        </h2>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Tanggal Masuk</p>
                            <p class="mt-1 text-gray-800">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d F Y') }}</p>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Departemen</p>
                            <div class="mt-2">
                                <span class="px-4 py-2 text-sm font-bold text-blue-800 bg-blue-100 rounded-full">
                                    {{ $employee->department->nama_departemen }}
                                </span>
                            </div>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Jabatan</p>
                            <div class="mt-2">
                                <span class="px-4 py-2 text-sm font-bold text-purple-800 bg-purple-100 rounded-full">
                                    {{ $employee->position->nama_jabatan }}
                                </span>
                            </div>
                        </div>

                        <div class="p-4 rounded-lg bg-gray-50">
                            <p class="text-sm font-semibold text-gray-600">Status Kepegawaian</p>
                            <div class="mt-2">
                                @if($employee->status == 'aktif')
                                    <span class="px-4 py-2 text-sm font-bold text-green-800 bg-green-100 rounded-full">AKTIF</span>
                                @else
                                    <span class="px-4 py-2 text-sm font-bold text-red-800 bg-red-100 rounded-full">NONAKTIF</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end pt-6 mt-8 space-x-4 border-t">
                    <a href="{{ route('employees.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Kembali
                    </a>
                    <a href="{{ route('employees.edit', $employee->id) }}" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
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