<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('master')
    @section('title', 'Daftar Pegawai')
    @section('content')

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Pegawai</h1>
                <p class="mt-1 text-gray-600">Kelola data pegawai perusahaan</p>
            </div>
            <a href="{{ route('employees.create') }}" class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Pegawai
            </a>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white">
                <thead class="text-white bg-gradient-to-r from-purple-600 to-indigo-600">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Nama Lengkap</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Email</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">No. Telepon</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Tanggal Lahir</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Tanggal Masuk</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Departemen</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Jabatan</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Status</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($employees as $employee)
                    <tr class="transition duration-200 hover:bg-purple-50">
                        <td class="px-4 py-4 text-sm font-medium text-gray-700">{{ $employee->nama_lengkap }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $employee->email }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ $employee->nomor_telepon }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($employee->tanggal_lahir)->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">{{ \Carbon\Carbon::parse($employee->tanggal_masuk)->format('d/m/Y') }}</td>
                        <td class="px-4 py-4 text-sm text-gray-600">
                            <span class="px-3 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full">
                                {{ $employee->department->nama_departemen ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-sm text-gray-600">
                            <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">
                                {{ $employee->position->nama_jabatan ?? '-' }}
                            </span>
                        </td>
                        <td class="px-4 py-4 text-sm">
                            @if($employee->status == 'aktif')
                                <span class="px-3 py-1 text-xs font-semibold text-green-800 bg-green-100 rounded-full">Aktif</span>
                            @else
                                <span class="px-3 py-1 text-xs font-semibold text-red-800 bg-red-100 rounded-full">Nonaktif</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 text-center">
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('employees.show', $employee->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-blue-500 rounded hover:bg-blue-600">
                                    Detail
                                </a>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="px-3 py-1 text-xs font-semibold text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin ingin menghapus pegawai ini?')" class="px-3 py-1 text-xs font-semibold text-white transition bg-red-500 rounded hover:bg-red-600">
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

        @if($employees->isEmpty())
        <div class="py-12 text-center">
            <svg class="w-12 h-12 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
            </svg>
            <h3 class="mt-2 text-sm font-medium text-gray-900">Belum ada data pegawai</h3>
            <p class="mt-1 text-sm text-gray-500">Mulai dengan menambahkan pegawai baru.</p>
        </div>
        @endif
    </div>

    @endsection
</body>
</html>