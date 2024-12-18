<!-- app/Views/mahasiswa/edit.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
</head>

<body>
    <h1>Edit Mahasiswa</h1>
    <form action="<?= site_url('/admin/editmhs/update/' . $mahasiswa['id']) ?>" method="post">
        <label for="user_id">User ID</label>
        <input type="text" name="user_id" id="user_id" value="<?= $mahasiswa['user_id'] ?>"><br>
        <label for="nim">NIM</label>
        <input type="text" name="nim" id="nim" value="<?= $mahasiswa['nim'] ?>"><br>
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" value="<?= $mahasiswa['nama'] ?>"><br>
        <label for="prodi">Prodi</label>
        <input type="text" name="prodi" id="prodi" value="<?= $mahasiswa['prodi'] ?>"><br>
        <label for="semester">Semester</label>
        <input type="number" name="semester" id="semester" value="<?= $mahasiswa['semester'] ?>"><br>
        <button type="submit">Update</button>
    </form>
</body>

</html>