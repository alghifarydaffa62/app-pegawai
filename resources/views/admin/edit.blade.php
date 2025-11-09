<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit data admin</title>
</head>
<body>
    @extends('master')
    @section('title', 'Edit Data Admin')
    @section('content')

    <div class="container px-6 py-4 mx-auto">
        <h1 class="mb-4 text-2xl font-semibold">Edit Data Admin</h1>

        <form action="{{ route('admin.update', $admin->id) }}" method="POST" class="px-8 pt-6 pb-8 bg-white rounded shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Nama</label>
                <input type="text" name="name" value="{{ old('name', $admin->name) }}"
                    class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:ring">
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Email</label>
                <input type="email" name="email" value="{{ old('email', $admin->email) }}"
                    class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:ring">
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Password Baru (opsional)</label>
                <input type="password" name="password"
                    class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:ring">
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block mb-2 text-sm font-bold text-gray-700">Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="w-full px-3 py-2 text-gray-700 border rounded shadow appearance-none focus:outline-none focus:ring">
            </div>

            <div class="flex items-center gap-3">
                <button type="submit"
                        class="px-4 py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.index') }}" class="text-gray-600 hover:underline">Batal</a>
            </div>
        </form>
    </div>

    @endsection
</body>
</html>