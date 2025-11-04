<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Mahasiswa</title>
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container text-center p-4">
  <h1>Data Mahasiswa</h1>
  <div class="row">
    <div class="m-auto">
      <ol class="list-group">
        @forelse ($students as $mhs)
          <li class="list-group-item">
            {{ $mhs->nama }} ({{ $mhs->nim }}) — Lahir: {{ $mhs->tanggal_lahir }}, IPK: {{ $mhs->ipk }}
          </li>
        @empty
          <div class="alert alert-dark d-inline-block">Tidak ada data.</div>
        @endforelse
      </ol>
    </div>
  </div>
</div>
</body>
</html>
