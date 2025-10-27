<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Absensi</title>
</head>
<body>
    @extends('master')
    @section('title', 'Detail Absensi')
    @section('content')

    <div class="max-w-3xl mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-blue-600 to-indigo-600">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-16 h-16 mr-4 bg-white rounded-full">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white">Detail Absensi</h1>
                        <p class="mt-1 text-blue-100">Informasi kehadiran karyawan</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8">
                <div class="space-y-6">
                    <!-- ID Absensi -->
                    <div class="p-4 border-l-4 border-blue-500 rounded-lg bg-gray-50">
                        <p class="text-sm font-semibold text-gray-600">ID Absensi</p>
                        <p class="mt-1 text-2xl font-bold text-gray-800">#{{ $attendance->id }}</p>
                    </div>

                    <!-- Nama Karyawan -->
                    <div class="p-4 rounded-lg bg-gray-50">
                        <p class="mb-2 text-sm font-semibold text-gray-600">Nama Karyawan</p>
                        <div class="flex items-center">
                            <div class="flex items-center justify-center w-12 h-12 mr-3 bg-blue-100 rounded-full">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <p class="text-xl font-bold text-gray-800">{{ $attendance->employee->nama_lengkap }}</p>
                        </div>
                    </div>

                    <!-- Tanggal -->
                    <div class="p-4 rounded-lg bg-gray-50">
                        <p class="text-sm font-semibold text-gray-600">Tanggal</p>
                        <p class="mt-1 text-lg font-semibold text-gray-800">
                            {{ \Carbon\Carbon::parse($attendance->tanggal)->format('l, d F Y') }}
                        </p>
                    </div>

                    <!-- Waktu Masuk & Keluar -->
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <div class="p-4 border-2 border-green-200 rounded-lg bg-green-50">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                </svg>
                                <p class="text-sm font-semibold text-green-700">Waktu Masuk</p>
                            </div>
                            <p class="text-3xl font-bold text-green-700">{{ $attendance->waktu_masuk }}</p>
                        </div>

                        <div class="p-4 border-2 border-orange-200 rounded-lg bg-orange-50">
                            <div class="flex items-center mb-2">
                                <svg class="w-5 h-5 mr-2 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <p class="text-sm font-semibold text-orange-700">Waktu Keluar</p>
                            </div>
                            <p class="text-3xl font-bold text-orange-700">
                                {{ $attendance->waktu_keluar ?? '-' }}
                            </p>
                        </div>
                    </div>

                    <!-- Status Absensi -->
                    <div class="p-4 rounded-lg bg-gray-50">
                        <p class="mb-3 text-sm font-semibold text-gray-600">Status Kehadiran</p>
                        <div>
                            @if($attendance->status_absensi == 'hadir')
                                <span class="inline-flex items-center px-6 py-3 text-lg font-bold text-green-800 bg-green-100 rounded-full">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    HADIR
                                </span>
                            @elseif($attendance->status_absensi == 'izin')
                                <span class="inline-flex items-center px-6 py-3 text-lg font-bold text-blue-800 bg-blue-100 rounded-full">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    IZIN
                                </span>
                            @elseif($attendance->status_absensi == 'sakit')
                                <span class="inline-flex items-center px-6 py-3 text-lg font-bold text-yellow-800 bg-yellow-100 rounded-full">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                    SAKIT
                                </span>
                            @else
                                <span class="inline-flex items-center px-6 py-3 text-lg font-bold text-red-800 bg-red-100 rounded-full">
                                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    ALPHA
                                </span>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end pt-6 mt-8 space-x-4 border-t">
                    <a href="{{ route('attendance.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Kembali
                    </a>
                    <a href="{{ route('attendance.edit', $attendance->id) }}" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
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