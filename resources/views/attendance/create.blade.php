<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Karyawan</title>
</head>
<body>
    <h1>Absensi Karyawan</h1>
    <form action="{{ route('attendance.store') }}" method="post">
        @csrf

        <label for="karyawan_id">Karyawan:</label><br>
        <select name="departemen_id" id="departemen_id" class="form-control" required>
            <option value="">-- Pilih Departemen --</option>
            @foreach($karyawan as $id)
                <option value="{{ $id->id }}">{{ $id->nama_lengkap }}</option>
            @endforeach
        </select>
        
        <label for="tanggal_absen">Tanggal:</label><br>
        <input type="date" name="tanggal_absen" id="tanggal_absen"><br><br>
        <label for="tanggal_absen">Status:</label><br>
        <input type="date" name="tanggal_absen" id="tanggal_absen"><br><br>
    </form>
</body>
</html>