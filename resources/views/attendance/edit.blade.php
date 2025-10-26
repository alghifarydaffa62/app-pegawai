<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Absensi</title>
</head>
<body>
    <h1>Edit Data Absensi</h1>
    
    <form action="{{ route('attendance.update', $attendance->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama_lengkap" value="{{ old('nama_lengkap', $attendance->employee->nama_lengkap) }}"></td>
                <input type="hidden" name="karyawan_id" value="{{ $attendance->karyawan_id }}">
            </tr>
            <tr>
                <td>tanggal</td>
                <td><input type="date" name="tanggal" value="{{ old('tanggal', $attendance->tanggal) }}"></td>
            </tr>
            <tr>
                <td>Waktu Masuk</td>
                <td><input type="time" name="waktu_masuk" value="{{ old('waktu_masuk', $attendance->waktu_masuk) }}"></td>
            </tr>
            <tr>
                <td>Waktu Keluar</td>
                <td><input type="time" name="waktu_keluar" value="{{ old('waktu_keluar', $attendance->waktu_keluar) }}"></td>
            </tr>
            <tr>
                <td><label for="status_absensi">Status Absensi</label></td>
                <td>
                    <select name="status_absensi" id="status_absensi" class="form-control" required>
                        <option value="">-- Status Absensi --</option>
                        <option value="hadir" {{ $attendance->status_absensi == 'hadir' ? 'selected' : '' }}>hadir</option>
                        <option value="izin" {{ $attendance->status_absensi == 'izin' ? 'selected' : '' }}>izin</option>
                        <option value="sakit" {{ $attendance->status_absensi == 'sakit' ? 'selected' : '' }}>sakit</option>
                        <option value="alpha" {{ $attendance->status_absensi == 'alpha' ? 'selected' : '' }}>alpha</option>
                    </select>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</body>
</html>