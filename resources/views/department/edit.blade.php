<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Departemen</title>
</head>
<body>
    <h1>Edit Data Departemen</h1>
    <form action="{{ route('department.update', $department->id) }}" method="post">
        @csrf
        @method('PUT')
        <table>
            <tr>
                <td>Nama Departemen</td>
                <td><input type="text" name="nama_departemen" value="{{ old('nama_departemen', $department->nama_departemen) }}"></td>
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