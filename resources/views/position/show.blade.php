<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jabatan</title>
</head>
<body>
    <h1>Detail Jabatan</h1>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th>Nama Jabatan</th>
            <td>{{ $position->nama_jabatan }}</td>
        </tr>
        <tr>
            <th>Gaji Pokok</th>
            <td>{{ $position->gaji_pokok }}</td>
        </tr>
    </table>
</body>
</html>