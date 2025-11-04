<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Daftar Student</title>
  <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container text-center p-4">
  <h1>Daftar Student</h1>

  @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <div class="row">
    <div class="col-sm-8 col-md-6 m-auto">
      <ol class="list-group">
        @forelse ($students as $student)
          <li class="list-group-item">
            <a href="{{ url('student/'.$student->nim) }}">
              {{ $loop->iteration }}. {{ $student->nama }}
            </a>
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
