<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Jabatan</title>
</head>
<body>
    <h1>Form Jabatan</h1>

    <form action="{{ route('position.store') }}" method="POST">
        @csrf

        <label for="nama_jabatan">Nama Jabatan:</label><br>
        <input type="text" name="nama_jabatan" id="nama_jabatan" required><br><br>

        <label for="gaji_pokok">Gaji Pokok:</label><br>
        <input type="number" name="gaji_pokok" id="gaji_pokok" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>