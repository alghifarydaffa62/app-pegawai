<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add admin</title>
</head>
<body>
    @extends('master')
    @section('title', 'Daftar Departemen')
    @section('content')

    <div class="max-w-md p-6 mx-auto mt-10 bg-white rounded-lg shadow">
        <h2 class="mb-4 text-2xl font-semibold">Tambah Admin Baru</h2>

        @if (session('success'))
            <div class="p-2 mb-4 text-green-800 bg-green-100 rounded">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="block mb-1 font-medium">Nama</label>
                <input type="text" name="name" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 font-medium">Email</label>
                <input type="email" name="email" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 font-medium">Password</label>
                <input type="password" name="password" class="w-full p-2 border rounded" required>
            </div>
            <div class="mb-3">
                <label class="block mb-1 font-medium">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
            </div>
            <button type="submit" class="px-4 py-2 text-white bg-blue-600 rounded">Tambah Admin</button>
        </form>
    </div>
    @endsection

</body>
</html>