<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<!-- test git -->

<body>
    <h1>Data Mahasiswa</h1>
    <a href="/admin/mhs_create">Tambah Mahasiswa</a>
    <table border="1">
        <tr>
            <th>NIM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Semester</th>
            <th>Action</th>
        </tr>
        <?php foreach ($mahasiswa as $mhs): ?>
            <tr>
                <td><?= $mhs['nim'] ?></td>
                <td><?= $mhs['nama'] ?></td>
                <td><?= $mhs['prodi'] ?></td>
                <td><?= $mhs['semester'] ?></td>
                <td>
                    <a href="/admin/mahasiswa/edit/<?= $mhs['id'] ?>">Edit</a> |
                    <a href="/admin/mahasiswa/delete/<?= $mhs['id'] ?>">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>