<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Dashboard Dosen</h1>
        <p>Selamat datang di Dashboard Dosen!</p>

        <nav class="mt-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/dosen/lihat-nilai" class="nav-link">Lihat Nilai</a></li>
                <li class="nav-item"><a href="/dosen/input-nilai" class="nav-link">Input Nilai</a></li>
            </ul>
        </nav>
    </div>
</body>
</html>
