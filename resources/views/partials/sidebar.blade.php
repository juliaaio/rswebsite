<div class="sidebar shadow-sm" id="sidebar">
    <div class="nav flex-column mt-5 pt-4">
        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
            <i class="bi bi-grid-1x2 me-3"></i> Dashboard
        </a>
        <a class="nav-link {{ request()->routeIs('patient.booking') ? 'active' : '' }}" href="{{ route('patient.booking') }}">
            <i class="bi bi-calendar-event me-3"></i> Booking Jadwal
        </a>
        <a class="nav-link" href="#"><i class="bi bi-journal-medical me-3"></i> Riwayat Kunjungan</a>
        <a
            class="nav-link {{ request()->routeIs('patient.queue') ? 'active' : '' }}"
            href="{{ route('patient.queue') }}"
        ><i class="bi bi-person-check me-3"></i> Cek Antrean</a>
        
        <form method="POST" action="{{ route('logout') }}" class="mt-5 ps-2">
            @csrf
            <button type="submit" class="btn text-danger fw-bold">
                <i class="bi bi-box-arrow-left me-3"></i> Keluar
            </button>
        </form>
    </div>
</div>