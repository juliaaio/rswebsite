<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pasien - CityCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    body { background-color: #f1f7fd; font-family: 'Open Sans', sans-serif; }
    .sidebar { background: #fff; height: 100vh; border-right: 1px solid #e0e0e0; position: fixed; width: inherit; }
    .main-content { margin-left: 16.666667%; }
    .nav-link { color: #2c4964; font-weight: 500; padding: 15px 20px; }
    .nav-link.active { background: #f1f7fd; color: #1977cc; border-right: 4px solid #1977cc; }
    .card-medis { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .rm-number { font-size: 24px; font-weight: 700; color: #1977cc; }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 d-none d-md-block sidebar p-0">
      <div class="p-4 text-center">
        <h4 class="fw-bold text-primary">CityCare</h4>
      </div>
      <nav class="nav flex-column mt-3">
        <a class="nav-link active" href="#">Dashboard</a>
        <a class="nav-link" href="{{ route('patient.booking') }}">Booking Jadwal</a>
        <a class="nav-link" href="#">Riwayat Medis</a>
        <a class="nav-link text-danger" href="{{ url('/') }}">Keluar</a>
      </nav>
    </div>

    <div class="col-md-10 p-4 main-content">

      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Halo, <span class="fw-bold text-primary">{{ auth()->user()->name }}</span>!</h4>

        @if($patient)
          <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
            Pasien Terverifikasi
          </span>
        @else
          <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-2">
            Menunggu Aktivasi
          </span>
        @endif
      </div>

      <div class="row mb-4">

        <!-- CARD RM -->
        <div class="col-md-4">
          <div class="card card-medis p-4 h-100">
            <p class="text-muted text-center small">Nomor Rekam Medis</p>

            @if($patient)
              <p class="rm-number text-center">{{ $patient->no_rm }}</p>
              <hr>
              <div class="small">
                <p><strong>NIK:</strong> {{ $patient->nik }}</p>
                <p><strong>Tgl Lahir:</strong> {{ $patient->tanggal_lahir ?? '-' }}</p>
                <p><strong>Gender:</strong> {{ $patient->gender ?? '-' }}</p>
                <p><strong>Alamat:</strong> {{ $patient->alamat ?? '-' }}</p>
              </div>
            @else
              <div class="text-center">
                <h5 class="text-danger">BELUM TERSEDIA</h5>
                <p class="small text-muted">Anda belum terdaftar sebagai pasien.</p>
                <a href="{{ route('patient.booking') }}" class="btn btn-primary btn-sm w-100">
                  Aktivasi No RM
                </a>
              </div>
            @endif
          </div>
        </div>

        <!-- RIWAYAT -->
        <div class="col-md-8">
          <div class="card card-medis p-4 h-100">

            @if($patient)
              <h5 class="fw-bold mb-3">Riwayat Kunjungan</h5>

              @if($visits->isEmpty())
                <p class="text-muted">Belum ada riwayat kunjungan</p>
              @else
                <table class="table">
                  <thead>
                    <tr>
                      <th>Tanggal</th>
                      <th>Poli</th>
                      <th>Dokter</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($visits as $visit)
                      <tr>
                        <td>{{ $visit->tanggal }}</td>
                        <td>{{ $visit->poli }}</td>
                        <td>{{ $visit->dokter }}</td>
                        <td>{{ $visit->status }}</td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              @endif

            @else
              <div class="text-center">
                <h5>Belum Ada Riwayat</h5>
                <a href="{{ route('patient.booking') }}" class="btn btn-outline-primary">
                  Buat Janji Pertama
                </a>
              </div>
            @endif

          </div>
        </div>

      </div>

    </div>
  </div>
</div>

</body>
</html>
