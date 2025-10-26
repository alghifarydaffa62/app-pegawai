<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji Employee</title>
</head>
<body>
    @extends('master')
    @section('title', 'Tambah Data Gaji')
    @section('content')

    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Tambah Data Gaji</h1>
                <p class="mt-1 text-gray-600">Isi form berikut untuk menambahkan data penggajian</p>
            </div>

            <!-- Form -->
            <form action="{{ route('salaries.store') }}" method="POST" class="space-y-6">
                @csrf

                <!-- Karyawan -->
                <div>
                    <label for="karyawan_id" class="block mb-2 text-sm font-semibold text-gray-700">
                        Pilih Karyawan <span class="text-red-500">*</span>
                    </label>
                    <select name="karyawan_id" id="karyawan_id" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($karyawan as $emp)
                            <option value="{{ $emp->id }}" data-gaji="{{ $emp->position->gaji_pokok ?? 0 }}">
                                {{ $emp->nama_lengkap }} ({{ $emp->position->nama_jabatan ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Bulan -->
                <div>
                    <label for="bulan" class="block mb-2 text-sm font-semibold text-gray-700">
                        Bulan Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="month" name="bulan" id="bulan" required
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>

                <!-- Gaji Pokok -->
                <div>
                    <label for="gaji_pokok" class="block mb-2 text-sm font-semibold text-gray-700">
                        Gaji Pokok <span class="text-red-500">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" readonly
                            class="w-full py-3 pl-12 pr-4 transition bg-gray-100 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Otomatis terisi dari jabatan karyawan</p>
                </div>

                <!-- Tunjangan & Potongan -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="tunjangan" class="block mb-2 text-sm font-semibold text-gray-700">
                            Tunjangan
                        </label>
                        <div class="relative">
                            <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                            <input type="number" name="tunjangan" id="tunjangan" value="0"
                                class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label for="potongan" class="block mb-2 text-sm font-semibold text-gray-700">
                            Potongan
                        </label>
                        <div class="relative">
                            <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                            <input type="number" name="potongan" id="potongan" value="0"
                                class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                </div>

                <!-- Total Gaji -->
                <div class="p-6 border-2 border-green-200 rounded-lg bg-green-50">
                    <label for="total_gaji" class="block mb-2 text-sm font-semibold text-gray-700">
                        Total Gaji Bersih
                    </label>
                    <div class="relative">
                        <span class="absolute text-lg font-bold text-green-600 left-4 top-3">Rp</span>
                        <input type="number" name="total_gaji" id="total_gaji" readonly
                            class="w-full py-3 pl-12 pr-4 text-2xl font-bold text-green-600 transition bg-white border-2 border-green-300 rounded-lg focus:ring-2 focus:ring-green-500">
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex justify-end pt-6 space-x-4 border-t">
                    <a href="{{ route('salaries.index') }}" 
                        class="px-6 py-3 font-semibold text-gray-700 transition border border-gray-300 rounded-lg hover:bg-gray-50">
                        Batal
                    </a>
                    <button type="submit" 
                        class="flex items-center px-6 py-3 font-semibold text-white transition duration-300 bg-green-600 rounded-lg shadow-md hover:bg-green-700">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const karyawanSelect = document.getElementById('karyawan_id');
        const gajiInput = document.getElementById('gaji_pokok');
        const tunjanganInput = document.getElementById('tunjangan');
        const potonganInput = document.getElementById('potongan');
        const totalInput = document.getElementById('total_gaji');

        function hitungTotal() {
            const gaji = parseInt(gajiInput.value) || 0;
            const tunjangan = parseInt(tunjanganInput.value) || 0;
            const potongan = parseInt(potonganInput.value) || 0;
            totalInput.value = gaji + tunjangan - potongan;
        }

        karyawanSelect.addEventListener('change', (e) => {
            const gaji = e.target.options[e.target.selectedIndex].dataset.gaji;
            gajiInput.value = gaji;
            hitungTotal();
        });

        tunjanganInput.addEventListener('input', hitungTotal);
        potonganInput.addEventListener('input', hitungTotal);
    </script>

    @endsection
</body>
</html>