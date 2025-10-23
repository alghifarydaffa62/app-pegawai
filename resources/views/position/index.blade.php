<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jabatan</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Jabatan</h1>

        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Jabatan</th>
                    <th>Gaji Pokok</th>
                </tr>
            </thead>
            <tbody>
                @foreach($position as $jabatan)
                <tr>
                    <td>{{ $jabatan->id }}</td>
                    <td>{{ $jabatan->nama_jabatan }}</td>
                    <td>{{ $jabatan->gaji_pokok }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>