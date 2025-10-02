<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h1>Daftar Mahasiswa</h1>
    <ul class="list-group">
      @foreach ($mahasiswa as $mhs)
        <li class="list-group-item">{{ $mhs }}</li>
      @endforeach
    </ul>
  </div>
</body>
</html>
