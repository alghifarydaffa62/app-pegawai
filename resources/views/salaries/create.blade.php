<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji Employee</title>
</head>
<body>
    <h1>Form Gaji Employee</h1>

    <form action="{{ route('salaries.store') }}" method="post">
        @csrf

        <label for="karyawan_id">Karyawan</label><br>
        <select name="karyawan_id" id="karyawan_id" class="form-control" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach($karyawan as $emp)
                <option value="{{ $emp->id }}" data-gaji="{{ $emp->position->gaji_pokok ?? 0 }}">
                    {{ $emp->nama_lengkap }} ({{ $emp->position->nama_jabatan ?? '-' }})
                </option>
            @endforeach
        </select><br><br>

        <label for="bulan">Bulan</label><br>
        <input type="month" name="bulan" id="bulan" required><br><br>

        <label for="gaji_pokok">Gaji Pokok</label><br>
        <input type="number" name="gaji_pokok" id="gaji_pokok" readonly><br><br>

        <label for="tunjangan">Tunjangan</label><br>
        <input type="number" name="tunjangan" id="tunjangan" value="0"><br><br>

        <label for="potongan">Potongan</label><br>
        <input type="number" name="potongan" id="potongan" value="0"><br><br>

        <label for="total_gaji">Total Gaji</label><br>
        <input type="number" name="total_gaji" id="total_gaji" readonly><br><br>

        <button type="submit">Simpan</button>
    </form>

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
</body>
</html>