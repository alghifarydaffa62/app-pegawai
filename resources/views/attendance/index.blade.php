<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Data Absensi</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Waktu Masuk</th>
                    <th>Waktu Keluar</th>
                    <th>Status Absensi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendance as $absen)
                <tr>
                    <td>{{ $absen->id }}</td>
                    <td>{{ $absen->employee->nama_lengkap }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <th>{{ $absen->waktu_masuk }}</th>
                    <th>{{ $absen->waktu_keluar }}</th>
                    <th>{{ $absen->status_absensi }}</th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>