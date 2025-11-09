<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @extends('master')
    @section('title', 'Data Absensi')
    @section('content')

    <div class="p-6 bg-white rounded-lg shadow-xl">
        <!-- Header -->
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Daftar Admin</h1>
                <p class="mt-1 text-gray-600">Kelola akun administrator sistem</p>
            </div>
            <a href="{{ route('admin.create') }}"
                class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-blue-600 rounded-lg shadow-md hover:bg-blue-700">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                Tambah Admin
            </a>
        </div>

        <!-- Flash Message -->
        @if(session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-100 border border-green-200 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
                <thead class="text-white bg-gradient-to-r from-blue-600 to-indigo-600">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-left">No</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Nama</th>
                        <th class="px-4 py-3 text-sm font-semibold text-left">Email</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($admin as $index => $a)
                        <tr class="transition duration-200 hover:bg-blue-50">
                            <td class="px-4 py-4 text-sm text-gray-600">{{ $index + 1 }}</td>
                            <td class="px-4 py-4 text-sm font-medium text-gray-800">{{ $a->name }}</td>
                            <td class="px-4 py-4 text-sm text-gray-600">{{ $a->email }}</td>
                            <td class="px-4 py-4 text-center">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.edit', $a->id) }}" 
                                        class="px-3 py-1 text-xs font-semibold text-white transition bg-yellow-500 rounded hover:bg-yellow-600">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.destroy', $a->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            onclick="return confirm('Yakin ingin menghapus admin ini?')"
                                            class="px-3 py-1 text-xs font-semibold text-white transition bg-red-500 rounded hover:bg-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-gray-500">
                                Belum ada data admin yang terdaftar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
    @endsection
</body>
</html>