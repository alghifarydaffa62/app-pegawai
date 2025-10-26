<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Pegawai</title>
</head>
<body>
    @extends('master')
    @section('title', 'Tambah Pegawai Baru')
    @section('content')

    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Tambah Pegawai Baru</h1>
                <p class="mt-1 text-gray-600">Isi form berikut untuk menambahkan pegawai baru</p>
            </div>

            <!-- Form -->
            <form action="{{ route('employees.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="nama_lengkap" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Lengkap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="nama_lengkap" name="nama_lengkap" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>

                <!-- Email & No Telepon -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="email" class="block mb-2 text-sm font-semibold text-gray-700">
                            Email <span class="text-red-500">*</span>
                        </label>
                        <input type="email" id="email" name="email" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="nomor_telepon" class="block mb-2 text-sm font-semibold text-gray-700">
                            Nomor Telepon <span class="text-red-500">*</span>
                        </label>
                        <input type="text" id="nomor_telepon" name="nomor_telepon" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Tanggal Lahir & Tanggal Masuk -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="tanggal_lahir" class="block mb-2 text-sm font-semibold text-gray-700">
                            Tanggal Lahir <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="tanggal_masuk" class="block mb-2 text-sm font-semibold text-gray-700">
                            Tanggal Masuk <span class="text-red-500">*</span>
                        </label>
                        <input type="date" id="tanggal_masuk" name="tanggal_masuk" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block mb-2 text-sm font-semibold text-gray-700">
                        Alamat <span class="text-red-500">*</span>
                    </label>
                    <textarea id="alamat" name="alamat" rows="3" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"></textarea>
                </div>

                <!-- Departemen & Jabatan -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="departemen_id" class="block mb-2 text-sm font-semibold text-gray-700">
                            Departemen <span class="text-red-500">*</span>
                        </label>
                        <select name="departemen_id" id="departemen_id" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">-- Pilih Departemen --</option>
                            @foreach($department as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->nama_departemen }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="jabatan_id" class="block mb-2 text-sm font-semibold text-gray-700">
                            Jabatan <span class="text-red-500">*</span>
                        </label>
                        <select name="jabatan_id" id="jabatan_id" required
                            class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                            <option value="">-- Pilih Jabatan --</option>
                            @foreach($position as $jabatan)
                                <option value="{{ $jabatan->id }}">{{ $jabatan->nama_jabatan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Status -->
                <div>
                    <label for="status" class="block mb-2 text-sm font-semibold text-gray-700">
                        Status <span class="text-red-500">*</span>
                    </label>
                    <select id="status" name="status" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 space-x-4 border-t">
                    <a href="{{ route('employees.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    @endsection
</body>
</html>