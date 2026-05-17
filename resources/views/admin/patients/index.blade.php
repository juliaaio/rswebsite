@extends('layouts.admin')

@section('content')

<h2 class="page-title mb-4">
    Patients
</h2>

<div class="card border-0 shadow-sm rounded-4">

    <div class="card-body">

        <form
            method="GET"
            class="mb-4"
        >

            <input
                type="text"
                name="search"
                value="{{ $search }}"
                class="form-control"
                placeholder="Cari nama / NIK / no RM..."
            >

        </form>

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>No RM</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>No HP</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($patients as $patient)

                    <tr>

                        <td>
                            {{ $patient->no_rm }}
                        </td>

                        <td>
                            {{ $patient->nama }}
                        </td>

                        <td>
                            {{ $patient->nik }}
                        </td>

                        <td>
                            {{ $patient->no_hp }}
                        </td>

                        <td>

                            <a
                                href="{{ route('admin.patients.edit', $patient->id) }}"
                                class="btn btn-primary btn-sm rounded-pill"
                            >
                                Edit
                            </a>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="5"
                            class="text-center text-muted py-4"
                        >

                            Data pasien tidak ditemukan

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection