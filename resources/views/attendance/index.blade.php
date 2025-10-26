<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
</head>
<body>
    @extends('master')
    @section('title', 'Data Absensi')
    @section('content')

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Data Absensi Karyawan</h1>
                <p class="mt-1 text-gray-600">Kelola data kehadiran karyawan</p>
            </div>
            <a href="{{ route('attendance.create') }}" class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Catat Absensi
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="text-white bg-gradient-to-r from-blue-600 to-indigo-600">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-left">ID</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Nama Karyawan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Tanggal</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Waktu Masuk</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Waktu Keluar</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Status</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($attendance as $absen)
                    <tr class="transition duration-200 hover:bg-blue-50">
                        <td class="px-4 py-4 font-mono text-sm text-gray-600">
                            #{{ $absen->id }}
                        </td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700">
                            {{ $absen->employee->nama_lengkap }}
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">
                            {{ \Carbon\Carbon::parse($absen->tanggal)->format('d F Y') }}
                        </td>
                        <td class="px-4 py-4 text-sm text-center text-gray-700">
                            <span class="px-3 py-1 font-semibold text-green-800 bg-green-100 rounded-full">
                                {{ $absen->waktu_masuk }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-sm text-center text-gray-700">
                            @if($absen->waktu_keluar)
                                <span class="px-3 py-1 font-semibold text-orange-800 bg-orange-100 rounded-full">
                                    {{ $absen->waktu_keluar }}
                                </span>
                            @else
                                <span class="text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-sm text-center">
                            @if($absen->status_absensi == 'hadir')
                                <span class="px-3 py-1 text-xs font-bold text-green-800 uppercase bg-green-100 rounded-full">Hadir</span>
                            @elseif($absen->status_absensi == 'izin')
                                <span class="px-3 py-1 text-xs font-bold text-blue-800 uppercase bg-blue-100 rounded-full">Izin</span>
                            @elseif($absen->status_absensi == 'sakit')
                                <span class="px-3 py-1 text-xs font-bold text-yellow-800 uppercase bg-yellow-100 rounded-full">Sakit</span>
                            @else
                                <span class="px-3 py-1 text-xs font-bold text-red-800 uppercase bg-red-100 rounded-full">Alpha</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('attendance.show', $absen->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-blue-500 rounded hover:bg-blue-600">
                                    Detail
                                </a>
                                <a href="{{ route('attendance.edit', $absen->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('attendance.destroy', $absen->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus data absensi ini?')" class="px-3 py-1 text-xs font-semibold text-white transition bg-red-500 rounded hover:bg-red-600">
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

        @if($attendance->isEmpty())
        <div class="py-12 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data absensi</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan mencatat kehadiran karyawan.</p>
        </div>
        @endif
    </div>

    @endsection
</body>
</html>