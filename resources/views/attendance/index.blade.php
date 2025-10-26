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
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($attendance as $absen)
                <tr>
                    <td>{{ $absen->id }}</td>
                    <td>{{ $absen->employee->nama_lengkap }}</td>
                    <td>{{ $absen->tanggal }}</td>
                    <td>{{ $absen->waktu_masuk }}</td>
                    <td>{{ $absen->waktu_keluar }}</td>
                    <td>{{ $absen->status_absensi }}</td>
                    <td>
                        <a href="{{ route('attendance.show', $absen->id) }}">Detail</a> |
                        <a href="{{ route('attendance.edit', $absen->id) }}">Edit</a> |
                        <form action="{{ route('attendance.destroy', $absen->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>