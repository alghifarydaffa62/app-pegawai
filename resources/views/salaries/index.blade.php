<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Gaji Pegawai</title>
</head>
<body>
    <h1>Data Gaji Pegawai</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Karyawan</th>
                <th>Bulan Pembayaran</th>
                <th>Gaji Pokok</th>
                <th>Tunjangan</th>
                <th>Potongan</th>
                <th>Total Gaji</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($salaries as $gaji)
            <tr>
                <td>{{ $gaji->employee->nama_lengkap }}</td>
                <td>{{ $gaji->bulan }}</td>
                <td>{{ $gaji->gaji_pokok }}</td>
                <td>{{ $gaji->tunjangan }}</td>
                <td>{{ $gaji->potongan }}</td>
                <td>{{ $gaji->total_gaji }}</td>
                <td>
                    <a href="{{ route('salaries.show', $gaji->id) }}">Detail</a> |
                    <a href="{{ route('salaries.edit', $gaji->id) }}">edit</a> |
                    <form action="{{ route('salaries.destroy', $gaji->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>