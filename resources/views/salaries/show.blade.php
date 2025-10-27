<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji Pegawai</title>
</head>
<body>
    @extends('master')
    @section('title', 'Detail Gaji Pegawai')
    @section('content')

    <div class="max-w-3xl mx-auto">
        <div class="overflow-hidden bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="px-8 py-6 bg-gradient-to-r from-emerald-600 to-teal-600">
                <div class="flex items-center">
                    <div class="flex items-center justify-center w-16 h-16 mr-4 bg-white rounded-full">
                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M12 8c-1.657 0-3 1.343-3 3v3H7a2 2 0 000 4h2v1a2 2 0 004 0v-1h2a2 2 0 000-4h-2v-3c0-.552.448-1 1-1s1-.448 1-1-1.343-2-3-2z" />
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-white">Detail Gaji Pegawai</h1>
                        <p class="mt-1 text-emerald-100">Informasi detail penggajian karyawan</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Nama Pegawai -->
                <div class="p-4 rounded-lg bg-gray-50">
                    <p class="mb-2 text-sm font-semibold text-gray-600">Nama Pegawai</p>
                    <div class="flex items-center">
                        <div class="flex items-center justify-center w-12 h-12 mr-3 rounded-full bg-emerald-100">
                            <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <p class="text-xl font-bold text-gray-800">{{ $salaries->employee->nama_lengkap }}</p>
                    </div>
                </div>

                <!-- Bulan Pembayaran -->
                <div class="p-4 rounded-lg bg-gray-50">
                    <p class="text-sm font-semibold text-gray-600">Bulan Pembayaran</p>
                    <p class="mt-1 text-lg font-semibold text-gray-800">
                        {{ \Carbon\Carbon::parse($salaries->bulan)->translatedFormat('F Y') }}
                    </p>
                </div>

                <!-- Rincian Gaji -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div class="p-4 border-2 rounded-lg border-emerald-200 bg-emerald-50">
                        <p class="text-sm font-semibold text-emerald-700">Gaji Pokok</p>
                        <p class="mt-1 text-2xl font-bold text-emerald-700">
                            Rp {{ number_format($salaries->gaji_pokok, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="p-4 border-2 border-teal-200 rounded-lg bg-teal-50">
                        <p class="text-sm font-semibold text-teal-700">Tunjangan</p>
                        <p class="mt-1 text-2xl font-bold text-teal-700">
                            Rp {{ number_format($salaries->tunjangan, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="p-4 border-2 rounded-lg border-rose-200 bg-rose-50">
                        <p class="text-sm font-semibold text-rose-700">Potongan</p>
                        <p class="mt-1 text-2xl font-bold text-rose-700">
                            Rp {{ number_format($salaries->potongan, 0, ',', '.') }}
                        </p>
                    </div>

                    <div class="p-4 border-2 border-indigo-200 rounded-lg bg-indigo-50">
                        <p class="text-sm font-semibold text-indigo-700">Total Gaji Diterima</p>
                        <p class="mt-1 text-3xl font-bold text-indigo-700">
                            Rp {{ number_format($salaries->total_gaji, 0, ',', '.') }}
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end pt-6 mt-8 space-x-4 border-t">
                    <a href="{{ route('salaries.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Kembali
                    </a>
                    <a href="{{ route('salaries.edit', $salaries->id) }}" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 rounded-lg shadow-md bg-emerald-600 hover:bg-emerald-700">
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