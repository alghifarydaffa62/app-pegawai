<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form add Departement</title>
</head>
<body>
    <h1>Form Departement</h1>
    <form action="{{ route('department.store') }}" method="POST">
        @csrf
        
        <label for="nama_departemen">Nama Departemen:</label><br>
        <input type="text" name="nama_departemen" id="nama_departemen" required><br><br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>