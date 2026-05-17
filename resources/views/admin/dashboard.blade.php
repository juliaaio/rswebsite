@extends('layouts.admin')

@section('content')

<h2 class="page-title mb-4">
    Dashboard Overview
</h2>


<!-- STATISTICS -->
<div class="row">

    <div class="col-md-4 mb-4">

        <div class="dashboard-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Total Patients
                    </h6>

                    <h2 class="fw-bold">
                        {{ $totalPatients }}
                    </h2>

                    <small class="text-success">
                        Registered Patients
                    </small>

                </div>

                <div class="icon bg-soft-blue">
                    <i class="bi bi-people-fill"></i>
                </div>

            </div>

        </div>

    </div>



    <div class="col-md-4 mb-4">

        <div class="dashboard-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Total Doctors
                    </h6>

                    <h2 class="fw-bold">
                        {{ $totalDoctors }}
                    </h2>

                    <small class="text-success">
                        Active Doctors
                    </small>

                </div>

                <div class="icon bg-soft-green">
                    <i class="bi bi-person-badge-fill"></i>
                </div>

            </div>

        </div>

    </div>



    <div class="col-md-4 mb-4">

        <div class="dashboard-card">

            <div class="d-flex justify-content-between align-items-center">

                <div>

                    <h6 class="text-muted">
                        Total Bookings
                    </h6>

                    <h2 class="fw-bold">
                        {{ $totalVisits }}
                    </h2>

                    <small class="text-success">
                        Patient Appointments
                    </small>

                </div>

                <div class="icon bg-soft-orange">
                    <i class="bi bi-calendar-check-fill"></i>
                </div>

            </div>

        </div>

    </div>

</div>



<!-- QUICK ACTION -->
<div class="row">

    <div class="col-md-8 mb-4">

        <div class="table-container">

            <div class="d-flex justify-content-between align-items-center mb-4">

                <div>

                    <h5 class="fw-bold mb-1">
                        Recent Bookings
                    </h5>

                    <small class="text-muted">
                        Latest patient appointment activity
                    </small>

                </div>

                <a
                    href="/admin/visits"
                    class="btn btn-primary btn-sm"
                >
                    View All
                </a>

            </div>


            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Patient</th>
                        <th>Poli</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($recentVisits as $visit)

                    <tr>

                        <td>
                            {{ $visit->patient->nama }}
                        </td>

                        <td>
                        {{ $visit->doctor->poli->nama ?? '-' }}
                        </td>

                        <td>
                            {{ $visit->doctor->nama }}
                        </td>

                        <td>
                            {{ $visit->tanggal }}
                        </td>

                        <td>

                            <span class="status-badge status-{{ $visit->status }}">
                                {{ $visit->status }}
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="4" class="text-center text-muted">
                            No booking data available
                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>



    <!-- RIGHT SIDE -->
    <div class="col-md-4 mb-4">

        <div class="dashboard-card mb-4">

            <h5 class="fw-bold mb-3">
                Queue Summary
            </h5>

            <div class="d-flex justify-content-between mb-3">

                <span>Waiting</span>

                <span class="badge bg-warning">
                    {{ $waitingCount }}
                </span>

            </div>

            <div class="d-flex justify-content-between mb-3">

                <span>Ongoing</span>

                <span class="badge bg-info">
                    {{ $ongoingCount }}
                </span>

            </div>

            <div class="d-flex justify-content-between">

                <span>Completed</span>

                <span class="badge bg-success">
                    {{ $completedCount }}
                </span>

            </div>

        </div>



        <div class="dashboard-card">

            <h5 class="fw-bold mb-3">
                Quick Menu
            </h5>

            <div class="d-grid gap-2">

                <a
                    href="/admin/visits"
                    class="btn btn-primary"
                >
                    Manage Bookings
                </a>

                <a
                    href="#"
                    class="btn btn-outline-primary"
                >
                    Manage Doctors
                </a>

                <a
                    href="#"
                    class="btn btn-outline-primary"
                >
                    Queue System
                </a>

            </div>

        </div>

    </div>

</div>

@endsection