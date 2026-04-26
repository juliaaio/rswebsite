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
    .main-content { margin-left: 16.666667%; } /* Agar tidak tertutup sidebar */
    .nav-link { color: #2c4964; font-weight: 500; padding: 15px 20px; }
    .nav-link.active { background: #f1f7fd; color: #1977cc; border-right: 4px solid #1977cc; }
    .card-medis { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
    .rm-number { font-size: 24px; font-weight: 700; color: #1977cc; }
  </style>
</head>
<body>

{{-- Simulasi Logika: Ganti true jadi false untuk ngetes --}}
@php $punya_no_rm = true; @endphp

<div class="container-fluid">
  <div class="row">
    <div class="col-md-2 d-none d-md-block sidebar p-0">
      <div class="p-4 text-center">
        <h4 class="fw-bold text-primary">CityCare</h4>
      </div>
      <nav class="nav flex-column mt-3">
        <a class="nav-link active" href="#"><i class="bi bi-house-door me-2"></i> Dashboard</a>
        <a class="nav-link" href="{{ url('/patient/booking') }}"><i class="bi bi-calendar-check me-2"></i> Booking Jadwal</a>
        <a class="nav-link" href="#"><i class="bi bi-file-earmark-medical me-2"></i> Riwayat Medis</a>
        <a class="nav-link text-danger" href="{{ url('/') }}"><i class="bi bi-box-arrow-left me-2"></i> Keluar</a>
      </nav>
    </div>

    <div class="col-md-10 p-4 main-content">
      
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4>Halo, <span class="fw-bold text-primary">Julia Nazli Mehlika</span>!</h4>
        
        @if($punya_no_rm)
            <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2">
                <i class="bi bi-patch-check-fill me-1"></i> Pasien Terverifikasi
            </span>
        @else
            <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-2">
                <i class="bi bi-clock-history me-1"></i> Menunggu Aktivasi
            </span>
        @endif
      </div>

      <div class="row d-flex align-items-stretch mb-4">
        
        <div class="col-md-4">
          <div class="card card-medis p-4 h-100">
            <p class="text-muted mb-1 text-center small">Nomor Rekam Medis</p>
            
            @if($punya_no_rm)
                <p class="rm-number text-center">12-34-56</p>
                <hr>
                <div class="small">
                    <p class="mb-1"><strong>NIK:</strong> 3510xxxxxxxxxxxx</p>
                    <p class="mb-1"><strong>Tgl Lahir:</strong> 12 Mei 2004</p>
                    <p class="mb-1"><strong>Gender:</strong> Perempuan</p>
                    <p class="mb-0"><strong>Alamat:</strong> Banyuwangi / Jember</p>
                </div>
            @else
                <div class="text-center py-3">
                    <h4 class="text-danger fw-bold">BELUM TERSEDIA</h4>
                    <p class="small text-muted">Anda belum terdaftar sebagai pasien medis resmi.</p>
                    <a href="{{ url('/patient/booking') }}" class="btn btn-primary btn-sm rounded-pill w-100 mt-2">
                        <i class="bi bi-pencil-square me-1"></i> Aktivasi No. RM
                    </a>
                </div>
                <hr>
                <p class="small text-muted text-center italic">Lengkapi profil Anda untuk mendapatkan identitas medis.</p>
            @endif
          </div>
        </div>

        <div class="col-md-8">
  <div class="card card-medis p-4 h-100"> 
    @if($punya_no_rm)
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 class="fw-bold mb-0">Riwayat Kunjungan</h5>
            
            <div class="input-group input-group-sm" style="width: 250px;">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text" class="form-control border-start-0 ps-0" placeholder="Cari poli/dokter...">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th class="small">TANGGAL</th>
                        <th class="small">POLI</th>
                        <th class="small">DOKTER</th>
                        <th class="small">STATUS</th>
                        <th class="small text-center">DETAIL</th>
                    </tr>
                </thead>
                <tbody>
                    <tr style="cursor: pointer;" onclick="window.location='{{ url('/patient/medical-record/1') }}'">
                        <td>26 April 2026</td>
                        <td><span class="fw-semibold">Poli Umum</span></td>
                        <td>drg. Julia</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Selesai</span></td>
                        <td class="text-center"><i class="bi bi-chevron-right text-primary"></i></td>
                    </tr>
                    
                    <tr style="cursor: pointer;" onclick="window.location='{{ url('/patient/medical-record/2') }}'">
                        <td>12 April 2026</td>
                        <td><span class="fw-semibold">Poli Gigi</span></td>
                        <td>dr. Amanda</td>
                        <td><span class="badge bg-success-subtle text-success border border-success-subtle">Selesai</span></td>
                        <td class="text-center"><i class="bi bi-chevron-right text-primary"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>
        
        <div class="mt-auto text-end">
            <a href="#" class="small text-decoration-none">Lihat Semua Riwayat →</a>
        </div>

    @else
        <div class="h-100 d-flex flex-column justify-content-center align-items-center text-center p-4">
            <i class="bi bi-folder-x text-muted" style="font-size: 3.5rem;"></i>
            <h5 class="mt-3 fw-bold">Belum Ada Riwayat Kunjungan</h5>
            <p class="text-muted small">Riwayat medis kamu akan muncul otomatis setelah kunjungan pertama.</p>
            <a href="{{ url('/patient/booking') }}" class="btn btn-outline-primary btn-sm rounded-pill mt-2 px-4">
                Buat Janji Temu Pertama
            </a>
        </div>
    @endif
  </div>
</div>

      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="card card-medis p-4 text-center">
            <i class="bi bi-plus-circle text-primary mb-2" style="font-size: 2rem;"></i>
            <h6 class="fw-bold">Daftar Berobat Sekarang</h6>
            <p class="text-muted small">Daftar poli tanpa antre di loket RS.</p>
            <a href="{{ url('/patient/booking') }}" class="btn btn-primary w-100 rounded-pill">Klik untuk Booking</a>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>

</body>
</html>