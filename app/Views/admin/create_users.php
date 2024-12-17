<h1>Tambah User</h1>

<form action="/admin/users/store" method="POST">
    <?= csrf_field() ?>
    <label for="username">Username</label>
    <input type="text" name="username" value="<?= old('username') ?>">
    <div><?= isset($errors['username']) ? $errors['username'] : '' ?></div>

    <label for="password">Password</label>
    <input type="password" name="password">
    <div><?= isset($errors['password']) ? $errors['password'] : '' ?></div>

    <label for="role">Role</label>
    <select name="role">
        <option value="mahasiswa" <?= old('role') == 'mahasiswa' ? 'selected' : '' ?>>Mahasiswa</option>
        <option value="dosen" <?= old('role') == 'dosen' ? 'selected' : '' ?>>Dosen</option>
        <option value="admin" <?= old('role') == 'admin' ? 'selected' : '' ?>>Admin</option>
    </select>
    <div><?= isset($errors['role']) ? $errors['role'] : '' ?></div>

    <button type="submit">Simpan</button>
</form>