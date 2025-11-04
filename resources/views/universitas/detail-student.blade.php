<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Detail Student</title>
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container text-center p-4">
  <h1>Detail Student</h1>

  <div class="card m-auto" style="max-width: 400px;">
    <div class="card-body">
      <h4 class="card-title">{{ $student->nama }}</h4>
      <p><strong>NIM:</strong> {{ $student->nim }}</p>
      <p><strong>Tanggal Lahir:</strong> {{ $student->tanggal_lahir }}</p>
      <p><strong>IPK:</strong> {{ $student->ipk }}</p>
      <a href="{{ url('/student') }}" class="btn btn-primary mt-2">← Kembali</a>
    </div>
  </div>
</div>
</body>
</html>
