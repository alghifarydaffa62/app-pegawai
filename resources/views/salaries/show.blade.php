<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Gaji Pegawai</title>
</head>
<body>
    <h1>Detail Gaji Pegawai</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Pegawai</th>
            <td>{{ $salaries->employee->nama_lengkap }}</td>
        </tr>
        <tr>
            <th>Bulan Pembayaran</th>
            <td>{{ $salaries->bulan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ $salaries->gaji_pokok }}</td>
        </tr>
        <tr>
            <th>Tunjangan Pegawai</th>
            <td>{{ $salaries->tunjangan }}</td>
        </tr>
        <tr>
            <th>Potongan Gaji</th>
            <td>{{ $salaries->potongan }}</td>
        </tr>
        <tr>
            <th>total gaji</th>
            <td>{{ $salaries->total_gaji }}</td>
        </tr>
    </table>
</body>
</html>