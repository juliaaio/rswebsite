<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard Pasien - CityCare</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <style>
    :root {
      --primary-color: #1977cc;
      --bg-color: #f8fbfe;
      --text-dark: #2c4964;
    }
    body { padding-top: 80px; background-color: var(--bg-color); font-family: 'Open Sans', sans-serif; color: var(--text-dark); overflow-x: hidden; }
    
    /* Sidebar styling */
    .sidebar { width: 260px; height: 100vh; position: fixed; left: 0; top: 0; background: #fff; transition: all 0.3s ease; z-index: 1000; border-right: 1px solid #edf2f7; }
    .sidebar.closed { left: -260px; }

    /* Main Content styling */
    .main-content { margin-left: 260px; padding: 30px; transition: all 0.3s ease; }
    .main-content.full-width { margin-left: 0; }

    /* Cards & Components */
    .card-custom { background: #fff; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.03); padding: 30px; }
    .welcome-text { font-size: 28px; font-weight: 700; }
    .btn-primary-custom { background: var(--primary-color); color: white; border: none; border-radius: 12px; padding: 12px 25px; font-weight: 600; text-decoration: none; display: inline-block; }
    .btn-primary-custom:hover { background: #166ab5; color: white; }
    
    .rm-title { color: #a0aec0; font-size: 13px; letter-spacing: 1px; text-transform: uppercase; }
    .rm-value { font-size: 32px; font-weight: 800; color: #e53e3e; margin: 15px 0; }
    .rm-value.active { color: var(--primary-color); }

    .nav-link { color: #7a8994; padding: 15px 30px; font-weight: 500; transition: 0.3s; text-decoration: none; display: block; }
    .nav-link:hover, .nav-link.active { color: var(--primary-color); background: #f0f7ff; border-right: 4px solid var(--primary-color); }
  </style>
</head>
<body>

    @include('partials.navbar')
    @include('partials.sidebar')


    <div class="main-content" id="main-content">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <div>
            <h1 class="welcome-text mb-1">Halo, {{ auth()->user()->name }}!</h1>
            <p class="text-muted mb-0">Selamat datang kembali di CityCare.</p>
        </div>

        <div class="text-end d-none d-md-block">
            <div class="card-custom py-2 px-3 d-inline-flex align-items-center shadow-sm" style="border-radius: 12px; background: white;">
                <i class="bi bi-calendar3 text-primary me-2"></i>
                <span id="currentDate" class="fw-bold text-muted small"></span>
            </div>
        </div>
    </div>


        <div class="row g-4">
            <div class="col-md-4">
                <div class="card-custom text-center h-100">
                    <div class="d-flex justify-content-center mb-3">
                        <div class="bg-primary-subtle p-3 rounded-4">
                            <i class="bi bi-person-vcard text-primary fs-4"></i>
                        </div>
                    </div>
                    <p class="rm-title mb-1">Status Rekam Medis</p>
                    
                    @if($patient)

                        <h2 class="rm-value active">
                            {{ $patient->no_rm }}
                        </h2>

                        <p class="text-muted small">
                            Nomor rekam medis Anda aktif.
                        </p>

                     @else

                        <h2 class="rm-value">
                            BELUM TERSEDIA
                        </h2>

                        <p class="text-muted small mb-4">
                            Anda belum terdaftar sebagai pasien tetap kami.
                        </p>

                        <a href="{{ route('patient.booking') }}"
                         class="btn btn-primary-custom w-100">

                         <i class="bi bi-shield-check me-2"></i>
                            Aktivasi No RM

                        </a>

                    @endif
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-custom d-flex justify-content-between align-items-center h-100">
                    <div style="max-width: 60%;">
                        @if($patient)

                        <h5 class="fw-bold mb-4">
                            Identitas Pasien
                         </h5>

                         <div class="row small">

                        <div class="col-md-6 mb-3">
                            <strong>Nama</strong>
                    <div class="text-muted">
                        {{ $patient->nama }}
                    </div>
                </div>

                    <div class="col-md-6 mb-3">
                        <strong>NIK</strong>
                        <div class="text-muted">
                            {{ $patient->nik }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Tanggal Lahir</strong>
                        <div class="text-muted">
                            {{ $patient->tanggal_lahir }}
                        </div>
                    </div>

                <div class="col-md-6 mb-3">
                    <strong>Jenis Kelamin</strong>
                    <div class="text-muted">
                        @if($patient->gender == 'L')
                            Laki-laki
                        @else
                            Perempuan
                        @endif
                    </div>
                </div>

                    <div class="col-md-6 mb-3">
                        <strong>No Hp</strong>
                        <div class="text-muted">
                            {{ $patient->no_hp }}
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <strong>Alamat</strong>
                        <div class="text-muted">
                            {{ $patient->alamat }}
                        </div>
                    </div>

                </div>

                @else

                    <h5 class="fw-bold mb-3">
                        Lengkapi Profil Kesehatan Anda
                    </h5>

                    <p class="text-muted small mb-4">
                        Anda belum memiliki data pasien.
                    </p>

                    <a href="{{ route('patient.booking') }}"
                    class="btn btn-primary-custom">

                        Aktivasi Sekarang

                    </a>

                @endif
                        <p class="text-muted small mb-4">Lengkapi data pribadi untuk memudahkan tenaga medis dalam memberikan pelayanan terbaik.</p>
                        <div class="d-flex gap-3">
                            <span class="small fw-bold text-primary"><i class="bi bi-check2-circle me-1"></i> Data Identitas</span>
                            <!-- <span class="small fw-bold text-muted"><i class="bi bi-three-dots me-1"></i> Riwayat Alergi</span> -->
                        </div>
                    </div>
                    <img src="https://img.freepik.com/free-vector/hospital-building-concept-illustration_114360-8440.jpg" alt="Hospital Illustration" style="width: 150px; border-radius: 15px;">
                </div>
            </div>

            <div class="col-12 mt-4">
                <div class="card-custom">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold"><i class="bi bi-clock-history me-2 text-primary"></i> Riwayat Kunjungan</h5>
                        <a
                        href="{{ route('riwayat.kunjungan') }}"
                        class="text-primary text-decoration-none small fw-bold">
                        Lihat Semua
                    </a>
                    </div>

                    @if($patient && !$visits->isEmpty())
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead class="text-muted small text-uppercase">
                                    <tr>
                                        <th>Tanggal Pemeriksaan</th>
                                        <th>Poli</th>
                                        <th>Dokter</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($visits as $visit)

                                        <tr class="align-middle">

                                            <td class="fw-bold">
                                                 {{ $visit->tanggal }}
                                            </td>

                                             <td>
                                                 <span class="badge bg-light text-dark border">
                                                    {{ $visit->doctor->poli->nama ?? '-' }}
                                                 </span>
                                            </td>

                                             <td>
                                                 {{ $visit->doctor->nama ?? '-' }}
                                             </td>

                                            <td>

@php

    $statusClass = match($visit->status) {

        'booked' => 'bg-primary-subtle text-primary',

        'cancelled' => 'bg-danger-subtle text-danger',

        'completed' => 'bg-success-subtle text-success',

        'pending' => 'bg-warning-subtle text-warning',

        default => 'bg-secondary-subtle text-secondary'
    };

@endphp

<a
    href="{{ route('patient.booking') }}"
    class="badge rounded-pill px-3 py-2 text-decoration-none {{ $statusClass }}"
>

    {{ $visit->status }}

</a>
                                            </td>

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <div class="mb-3 text-muted opacity-25">
                                <i class="bi bi-folder-x" style="font-size: 4rem;"></i>
                            </div>
                            <h5 class="fw-bold">Belum Ada Riwayat</h5>
                            <p class="text-muted small">Riwayat kunjungan akan muncul setelah Anda melakukan pemeriksaan.</p>
                            <a href="{{ route('patient.booking') }}" class="btn btn-primary-custom mt-2">
                                <i class="bi bi-plus-lg me-1"></i> Buat Janji Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @include('partials.footer')
    </div>

    <script>
        const btn = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('main-content');

        btn.addEventListener('click', () => {
            sidebar.classList.toggle('closed');
            content.classList.toggle('full-width');
        });
    </script>

    <script>
    function updateDate() {
        const options = { 
            weekday: 'long', 
            year: 'numeric', 
            month: 'long', 
            day: 'numeric' 
        };
        const today = new Date();
        // Menggunakan format Indonesia (id-ID)
        document.getElementById('currentDate').innerText = today.toLocaleDateString('id-ID', options);
    }

    // Panggil fungsi saat halaman dimuat
    updateDate();
</script>

</body>
</html>