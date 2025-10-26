<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Gaji</title>
</head>
<body>
    <h1>Edit Data Gaji {{ $salaries->employee->nama_lengkap }}</h1>
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('salaries.update', $salaries->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <th>Nama Pegawai</th>
                <td>
                    <input type="text" value="{{ $salaries->employee->nama_lengkap }}" readonly>
                    <input type="hidden" name="karyawan_id" value="{{ $salaries->karyawan_id }}">
                </td>
            </tr>

            <tr>
                <th>Bulan Pembayaran</th>
                <td>
                    <input type="month" name="bulan" value="{{ old('bulan', $salaries->bulan) }}">
                </td>
            </tr>

            <tr>
                <th>Gaji Pokok</th>
                <td>
                    <input type="number" name="gaji_pokok" id="gaji_pokok" value="{{ old('gaji_pokok', $salaries->gaji_pokok) }}" readonly>
                </td>
            </tr>

            <tr>
                <th>Tunjangan</th>
                <td>
                    <input type="number" name="tunjangan" id="tunjangan" value="{{ old('tunjangan', $salaries->tunjangan) }}">
                </td>
            </tr>

            <tr>
                <th>Potongan</th>
                <td>
                    <input type="number" name="potongan" id="potongan" value="{{ old('potongan', $salaries->potongan) }}">
                </td>
            </tr>

            <tr>
                <th>Total Gaji</th>
                <td>
                    <input type="number" name="total_gaji" id="total_gaji" value="{{ $salaries->total_gaji }}" readonly>
                </td>
            </tr>

            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>

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
        // inisialisasi
        hitungTotal();
    </script>

</body>
</html>