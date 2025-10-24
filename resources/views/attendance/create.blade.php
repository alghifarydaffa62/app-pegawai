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
        <select name="karyawan_id" id="karyawan_id" class="form-control" required>
            <option value="">-- Pilih Karyawan --</option>
            @foreach($karyawan as $id)
                <option value="{{ $id->id }}">{{ $id->nama_lengkap }}</option>
            @endforeach
        </select><br><br>
        
        <label for="tanggal">Tanggal:</label><br>
        <input type="date" name="tanggal" id="tanggal"><br><br>

        <label for="waktu_masuk">Waktu Masuk:</label><br>
        <input type="time" name="waktu_masuk" id="waktu_masuk"><br><br>
        
        <label for="waktu_keluar">Waktu Keluar:</label><br>
        <input type="time" name="waktu_keluar" id="waktu_keluar"><br><br>
        
        <label for="status_absensi">Status:</label><br>
        <select id="status_absensi" name="status_absensi">
            <option value="hadir">hadir</option>
            <option value="izin">izin</option>
            <option value="sakit">sakit</option>
            <option value="alpha">alpha</option>
        </select><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>