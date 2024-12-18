<h1>Kelola User</h1>

<?php if (session()->getFlashdata('message')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('message') ?></div>
<?php endif; ?>

<a href="/admin/create_users" class="btn btn-success">Tambah User</a>
<!-- almaidaerwin 11222009 -->
<table border="1">
    <thead>
        <tr>
            <th>Username</th>
            <th>NIM</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= $user['username'] ?></td>
                <td><?= $user['nim'] ?></td>
                <td><?= ucfirst($user['role']) ?></td>
                <td>
                    <a href="/admin/users/delete/<?= $user['id'] ?>" onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</a>
                </td>
                <td>
                    <a href="/admin/edit/<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>