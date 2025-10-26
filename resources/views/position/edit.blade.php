<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Jabatan</title>
</head>
<body>
    <h1>Edit Data Jabatan</h1>

    <form action="{{ route('position.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <td>Nama Jabatan</td>
                <td><input type="text" name="nama_jabatan" value="{{ old('nama_jabatan', $position->nama_jabatan) }}"></td>
            </tr>
            <tr>
                <td>Gaji Pokok</td>
                <td><input type="number" name="gaji_pokok" value="{{ old('gaji_pokok', $position->gaji_pokok) }}"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
</body>
</html>