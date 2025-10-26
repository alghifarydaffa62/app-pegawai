<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Gaji Pegawai</title>
</head>
<body>
    @extends('master')
    @section('title', 'Data Gaji Pegawai')
    @section('content')

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Gaji Pegawai</h1>
                <p class="mt-1 text-gray-600">Kelola data penggajian karyawan</p>
            </div>
            <a href="{{ route('salaries.create') }}" class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-green-600 rounded-lg shadow-md hover:bg-green-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Data Gaji
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="text-white bg-gradient-to-r from-green-600 to-teal-600">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Nama Karyawan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Bulan Pembayaran</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Gaji Pokok</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Tunjangan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Potongan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Total Gaji</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($salaries as $gaji)
                    <tr class="transition duration-200 hover:bg-green-50">
                        <td class="px-4 py-4 text-sm font-medium text-gray-700">
                            {{ $gaji->employee->nama_lengkap }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($gaji->bulan)->format('F Y') }}
                        </td>
                        <td class="px-4 py-4 text-sm font-semibold text-right text-gray-700">
                            Rp {{ number_format($gaji->gaji_pokok, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-sm font-semibold text-right text-green-600">
                            + Rp {{ number_format($gaji->tunjangan, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-sm font-semibold text-right text-red-600">
                            - Rp {{ number_format($gaji->potongan, 0, ',', '.') }}
                        </td>
                        <td class="px-4 py-4 text-sm text-right text-gray-800">
                            <span class="px-3 py-1 font-bold text-green-800 bg-green-100 rounded-full">
                                Rp {{ number_format($gaji->total_gaji, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('salaries.show', $gaji->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-blue-500 rounded hover:bg-blue-600">
                                    Detail
                                </a>
                                <a href="{{ route('salaries.edit', $gaji->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('salaries.destroy', $gaji->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data gaji ini?')" class="px-3 py-1 text-xs font-semibold text-white transition bg-red-500 rounded hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($salaries->isEmpty())
        <div class="py-12 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data gaji</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan data gaji pegawai.</p>
        </div>
        @endif
    </div>

    @endsection
</body>
</html>