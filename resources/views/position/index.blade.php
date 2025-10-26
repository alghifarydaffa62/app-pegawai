<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jabatan</title>
</head>
<body>
    @extends('master')
    @section('title', 'Daftar Jabatan')
    @section('content')

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Jabatan</h1>
                <p class="mt-1 text-gray-600">Kelola data jabatan dan gaji pokok</p>
            </div>
            <a href="{{ route('position.create') }}" class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Jabatan
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="text-white bg-gradient-to-r from-purple-600 to-pink-600">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-left">ID</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Nama Jabatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-right">Gaji Pokok</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($position as $jabatan)
                    <tr class="transition duration-200 hover:bg-purple-50">
                        <td class="px-4 py-4 font-mono text-sm text-gray-600">
                            #{{ $jabatan->id }}
                        </td>
                        <td class="px-4 py-4 text-sm font-medium text-gray-700">
                            <div class="flex items-center">
                                <div class="flex items-center justify-center w-10 h-10 mr-3 bg-purple-100 rounded-full">
                                    <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                                {{ $jabatan->nama_jabatan }}
                            </div>
                        </td>
                        <td class="px-4 py-4 text-sm text-right text-gray-800">
                            <span class="px-4 py-2 font-bold text-purple-800 bg-purple-100 rounded-full">
                                Rp {{ number_format($jabatan->gaji_pokok, 0, ',', '.') }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('position.show', $jabatan->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-blue-500 rounded hover:bg-blue-600">
                                    Detail
                                </a>
                                <a href="{{ route('position.edit', $jabatan->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('position.destroy', $jabatan->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus jabatan ini?')" class="px-3 py-1 text-xs font-semibold text-white transition bg-red-500 rounded hover:bg-red-600">
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

        @if($position->isEmpty())
        <div class="py-12 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data jabatan</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan jabatan baru.</p>
        </div>
        @endif
    </div>

    @endsection
</body>
</html>