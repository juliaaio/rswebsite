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

    <style>

.queue-hero{
    background:linear-gradient(135deg,#1977cc,#0d6efd);
    border-radius:30px;
    padding:55px;
    color:#fff;
    text-align:center;
    box-shadow:0 10px 30px rgba(25,119,204,.25);
    margin-bottom:30px;
}

.queue-hero small{
    font-size:18px;
    opacity:.9;
}

.queue-hero h1{
    font-size:95px;
    font-weight:800;
    margin:10px 0;
}

.queue-status{
    display:inline-block;
    padding:10px 24px;
    border-radius:999px;
    background:rgba(255,255,255,.2);
    font-weight:600;
    text-transform:capitalize;
}

.queue-card{
    background:#fff;
    border-radius:24px;
    padding:28px;
    box-shadow:0 5px 20px rgba(0,0,0,.04);
    height:100%;
}

.queue-card small{
    color:#94a3b8;
    display:block;
    margin-bottom:10px;
}

.queue-card h3{
    font-weight:700;
    color:#1e293b;
}

.info-card{
    background:#fff;
    border-radius:24px;
    padding:30px;
    box-shadow:0 5px 20px rgba(0,0,0,.04);
}

.info-label{
    color:#94a3b8;
    font-size:14px;
    margin-bottom:6px;
}

.info-value{
    font-weight:600;
    color:#1e293b;
}

</style>

<div class="card-custom">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h4 class="fw-bold">
            Riwayat Kunjungan
        </h4>

    </div>

    <div class="table-responsive">

        <table class="table table-hover">

            <thead>

                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Poli</th>
                    <th>Dokter</th>
                    <th>Status</th>
                </tr>

            </thead>

            <tbody>

                @forelse($visits as $visit)

                <tr>

                    <td>
                        {{ $visit->tanggal }}
                    </td>

                    <td>
                        {{ $visit->doctor->poli->nama ?? '-' }}
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
                            default => 'bg-secondary-subtle text-secondary' };
                    @endphp

                    <a
                        href="{{ route('patient.booking') }}"
                        class="badge rounded-pill px-3 py-2 text-decoration-none {{ $statusClass }}">{{ $visit->status }}
                    </a>

                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="4" class="text-center py-4">
                        Belum ada riwayat kunjungan
                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

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