<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Departement</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Daftar Departemen</h1>
        <table border="1" cellpadding="5" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Departemen</th>
                </tr>
            </thead>
            <tbody>
                @foreach($department as $dept)
                <tr>
                    <td>{{ $dept->id }}</td>
                    <td>{{ $dept->nama_departemen }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>