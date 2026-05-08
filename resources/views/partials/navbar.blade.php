<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom fixed-top px-4">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <button class="btn btn-light me-3" id="sidebarToggle">
                <i class="bi bi-list fs-4"></i>
            </button>
            <a class="navbar-brand fw-bold text-primary" href="#">
                CityCare <i class="bi bi-hospital ms-1"></i>
            </a>
        </div>

        <div class="d-flex align-items-center ms-auto">
            @if(Auth::user()->no_rm)
                <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-2 me-3 d-none d-sm-inline">
                    <i class="bi bi-check-circle-fill me-1"></i> Terverifikasi
                </span>
            @else
                <span class="badge bg-warning-subtle text-warning border border-warning-subtle rounded-pill px-3 py-2 me-3 d-none d-sm-inline">
                    <i class="bi bi-clock-history me-1"></i> Menunggu Aktivasi
                </span>
            @endif

            <a href="{{ route('profile.edit') }}" class="d-flex align-items-center text-decoration-none border-start ps-3">
                <div class="text-end me-2 d-none d-md-block">
                    <p class="mb-0 fw-bold text-dark small" style="line-height: 1;">{{ Auth::user()->name }}</p>
                    <small class="text-muted" style="font-size: 10px;">Pasien {{ Auth::user()->no_rm ? 'Tetap' : 'Umum' }}</small>
                </div>
                <div class="position-relative">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&background=1977cc&color=fff" 
                         alt="Profile" 
                         class="rounded-circle border" 
                         width="35" height="35">
                    <span class="position-absolute bottom-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                </div>
            </a>
        </div>
    </div>
</nav>