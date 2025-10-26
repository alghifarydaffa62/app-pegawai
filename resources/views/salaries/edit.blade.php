<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Gaji</title>
</head>
<body>
    @extends('master')
    @section('title', 'Edit Data Gaji')
    @section('content')

    <div class="max-w-4xl mx-auto">
        <div class="p-8 bg-white rounded-lg shadow-xl">
            <!-- Header -->
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Edit Data Gaji</h1>
                <p class="mt-1 text-gray-600">Update data penggajian {{ $salaries->employee->nama_lengkap }}</p>
            </div>

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="p-4 mb-6 border-l-4 border-red-500 rounded bg-red-50">
                    <div class="flex">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <ul class="text-sm text-red-700 list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('salaries.update', $salaries->id) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <!-- Nama Pegawai (Readonly) -->
                <div>
                    <label for="nama_pegawai" class="block mb-2 text-sm font-semibold text-gray-700">
                        Nama Pegawai
                    </label>
                    <input type="text" id="nama_pegawai" readonly
                        value="{{ $salaries->employee->nama_lengkap }}"
                        class="w-full px-4 py-3 text-gray-600 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    <input type="hidden" name="karyawan_id" value="{{ $salaries->karyawan_id }}">
                </div>

                <!-- Bulan Pembayaran -->
                <div>
                    <label for="bulan" class="block mb-2 text-sm font-semibold text-gray-700">
                        Bulan Pembayaran <span class="text-red-500">*</span>
                    </label>
                    <input type="month" name="bulan" id="bulan" required
                        value="{{ old('bulan', $salaries->bulan) }}"
                        class="w-full px-4 py-3 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                </div>

                <!-- Gaji Pokok (Readonly) -->
                <div>
                    <label for="gaji_pokok" class="block mb-2 text-sm font-semibold text-gray-700">
                        Gaji Pokok
                    </label>
                    <div class="relative">
                        <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                        <input type="number" name="gaji_pokok" id="gaji_pokok" readonly
                            value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}"
                            class="w-full py-3 pl-12 pr-4 text-gray-600 bg-gray-100 border border-gray-300 rounded-lg cursor-not-allowed">
                    </div>
                    <p class="mt-1 text-sm text-gray-500">Otomatis dari jabatan karyawan</p>
                </div>

                <!-- Tunjangan & Potongan -->
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    <div>
                        <label for="tunjangan" class="block mb-2 text-sm font-semibold text-gray-700">
                            Tunjangan
                        </label>
                        <div class="relative">
                            <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                            <input type="number" name="tunjangan" id="tunjangan"
                                value="{{ old('tunjangan', $salaries->tunjangan) }}"
                                class="w-full py-3 pl-12 pr-4 transition border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                        </div>
                    </div>
                    <div>
                        <label for="potongan" class="block mb-2 text-sm font-semibold text-gray-700">
                            Potongan
                        </label>
                        <div class="relative">
                            <span class="absolute font-semibold text-gray-500 left-4 top-3">Rp</span>
                            <input type="number" name="potongan" id="potongan"
                                value="{{ old('potongan', $salaries->potongan) }}"
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
                            value="{{ $salaries->total_gaji }}"
                            class="w-full py-3 pl-12 pr-4 text-2xl font-bold text-green-600 bg-white border-2 border-green-300 rounded-lg cursor-not-allowed">
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
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
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

        tunjanganInput.addEventListener('input', hitungTotal);
        potonganInput.addEventListener('input', hitungTotal);
        
        // Inisialisasi
        hitungTotal();
    </script>

    @endsection
</body>
</html>