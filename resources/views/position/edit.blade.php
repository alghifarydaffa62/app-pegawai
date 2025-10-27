<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
</head>
<body>
    @extends('master')
    @section('title', 'Edit Jabatan')
    @section('content')

    <div class="max-w-2xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Jabatan</h1>
                <p class="mt-1 text-gray-600">Update informasi jabatan</p>
            </div>

            <!-- Form -->
            <form action="{{ route('position.update', $position->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Jabatan -->
                <div>
                    <label for="nama_jabatan" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Jabatan <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <input type="text" name="nama_jabatan" id="nama_jabatan" required
                            value="{{ old('nama_jabatan', $position->nama_jabatan) }}"
                            placeholder="Contoh: Manager, Staff, Supervisor"
                            class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Gaji Pokok -->
                <div>
                    <label for="gaji_pokok" class="block mb-2 text-sm font-semibold text-gray-700">
                        Gaji Pokok <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute text-lg font-bold text-gray-600 left-4 top-3">Rp</span>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" required
                            value="{{ old('gaji_pokok', $position->gaji_pokok) }}"
                            placeholder="0"
                            class="w-full py-3 pl-12 pr-4 text-lg font-semibold transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                    </div>
                </div>

                <!-- Preview Gaji -->
                <div class="p-4 border-2 border-purple-200 rounded-lg bg-purple-50">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 mr-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <p class="text-sm font-semibold text-gray-700">Preview Format Gaji:</p>
                            <p class="text-xl font-bold text-purple-600" id="preview-gaji">Rp {{ number_format($position->gaji_pokok, 0, ',', '.') }}</p>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 space-x-4 border-t">
                    <a href="{{ route('position.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-purple-600 rounded-lg shadow-md hover:bg-purple-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Format preview gaji
        const gajiInput = document.getElementById('gaji_pokok');
        const previewGaji = document.getElementById('preview-gaji');

        gajiInput.addEventListener('input', function() {
            const value = parseInt(this.value) || 0;
            previewGaji.textContent = 'Rp ' + value.toLocaleString('id-ID');
        });
    </script>

    @endsection
</body>
</html>