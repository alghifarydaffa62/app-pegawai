<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
</head>
<body>
    @extends('master')
    @section('title', 'Catat Absensi')
    @section('content')

    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Catat Absensi Karyawan</h1>
                <p class="mt-1 text-gray-600">Isi form berikut untuk mencatat kehadiran karyawan</p>
            </div>

            <!-- Form -->
            <form action="{{ route('attendance.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Karyawan -->
                <div>
                    <label for="karyawan_id" class="block mb-2 text-sm font-semibold text-gray-700">
                        Pilih Karyawan <span class="text-red-500">*</span>
                    </label>
                    <select name="karyawan_id" id="karyawan_id" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($karyawan as $id)
                            <option value="{{ $id->id }}">{{ $id->nama_lengkap }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tanggal -->
                <div>
                    <label for="tanggal" class="block mb-2 text-sm font-semibold text-gray-700">
                        Tanggal <span class="text-red-500">*</span>
                    </label>
                    <input type="date" name="tanggal" id="tanggal" required
                        value="{{ date('Y-m-d') }}"
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>

                <!-- Waktu Masuk & Keluar -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="waktu_masuk" class="block mb-2 text-sm font-semibold text-gray-700">
                            Waktu Masuk <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <svg class="absolute w-5 h-5 text-gray-400 left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <input type="time" name="waktu_masuk" id="waktu_masuk" required
                                class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label for="waktu_keluar" class="block mb-2 text-sm font-semibold text-gray-700">
                            Waktu Keluar
                        </label>
                        <div class="relative">
                            <svg class="absolute w-5 h-5 text-gray-400 left-3 top-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <input type="time" name="waktu_keluar" id="waktu_keluar"
                                class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <p class="mt-1 text-sm text-gray-500">Opsional - Bisa diisi nanti</p>
                    </div>
                </div>

                <!-- Status Absensi -->
                <div>
                    <label for="status_absensi" class="block mb-2 text-sm font-semibold text-gray-700">
                        Status Kehadiran <span class="text-red-500">*</span>
                    </label>
                    <div class="grid grid-cols-2 gap-4 md:grid-cols-4">
                        <label class="relative cursor-pointer">
                            <input type="radio" name="status_absensi" value="hadir" checked class="sr-only peer">
                            <div class="p-4 text-center transition border-2 border-gray-300 rounded-lg peer-checked:border-green-500 peer-checked:bg-green-50">
                                <div class="flex items-center justify-center w-8 h-8 mx-auto mb-2 bg-green-100 rounded-full peer-checked:bg-green-200">
                                    <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Hadir</span>
                            </div>
                        </label>

                        <label class="relative cursor-pointer">
                            <input type="radio" name="status_absensi" value="izin" class="sr-only peer">
                            <div class="p-4 text-center transition border-2 border-gray-300 rounded-lg peer-checked:border-blue-500 peer-checked:bg-blue-50">
                                <div class="flex items-center justify-center w-8 h-8 mx-auto mb-2 bg-blue-100 rounded-full peer-checked:bg-blue-200">
                                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Izin</span>
                            </div>
                        </label>

                        <label class="relative cursor-pointer">
                            <input type="radio" name="status_absensi" value="sakit" class="sr-only peer">
                            <div class="p-4 text-center transition border-2 border-gray-300 rounded-lg peer-checked:border-yellow-500 peer-checked:bg-yellow-50">
                                <div class="flex items-center justify-center w-8 h-8 mx-auto mb-2 bg-yellow-100 rounded-full peer-checked:bg-yellow-200">
                                    <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Sakit</span>
                            </div>
                        </label>

                        <label class="relative cursor-pointer">
                            <input type="radio" name="status_absensi" value="alpha" class="sr-only peer">
                            <div class="p-4 text-center transition border-2 border-gray-300 rounded-lg peer-checked:border-red-500 peer-checked:bg-red-50">
                                <div class="flex items-center justify-center w-8 h-8 mx-auto mb-2 bg-red-100 rounded-full peer-checked:bg-red-200">
                                    <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </div>
                                <span class="text-sm font-semibold text-gray-700">Alpha</span>
                            </div>
                        </label>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 space-x-4 border-t">
                    <a href="{{ route('attendance.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Absensi
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Set default time to current time for waktu_masuk
        const waktuMasukInput = document.getElementById('waktu_masuk');
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        waktuMasukInput.value = `${hours}:${minutes}`;
    </script>

    @endsection
</body>
</html>