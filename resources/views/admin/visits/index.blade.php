@extends('layouts.admin')

@section('content')

<h2 class="page-title mb-4">
    Booking Management
</h2>

    <form
        method="GET"
        class="mb-4"
    >

        <input
            type="date"
            name="tanggal"
            value="{{ $tanggal }}"
            class="form-control w-auto"
            onchange="this.form.submit()"
        >

    </form>

@foreach($visits as $namaPoli => $items)

<div class="card border-0 shadow-sm rounded-4 mb-4">

    <div class="card-header bg-primary text-white rounded-top-4">

        <h5 class="mb-0">
            {{ $namaPoli }}
        </h5>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>

                    <tr>

                        <th>Patient</th>
                        <th>Doctor</th>
                        <th>Jadwal</th>
                        <th>Queue</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($items as $visit)

                    <tr>

                        <td>

                            <div class="fw-semibold">
                                {{ $visit->patient->nama }}
                            </div>

                            <small class="text-muted">
                                {{ $visit->patient->no_rm }}
                            </small>

                        </td>



                        <td>
                            {{ $visit->doctor->nama }}
                        </td>



                        <td>

                            @if($visit->schedule)

                                {{ $visit->schedule->day }}

                                <br>

                                {{ $visit->schedule->time_start }}
                                -
                                {{ $visit->schedule->time_finish }}

                            @endif

                        </td>



                        <td>

                            <span class="badge bg-primary">

                                {{ $visit->queue_number }}

                            </span>

                        </td>



                        <td>

                            <span class="status-badge status-{{ $visit->status }}">

                                {{ $visit->status }}

                            </span>

                        </td>



                        <td>

                            <form
                                action="/admin/visits/{{ $visit->id }}/status"
                                method="POST"
                            >

                                @csrf
                                @method('PUT')

                                <select
                                    name="status"
                                    class="form-select form-select-sm"
                                    onchange="this.form.submit()"
                                >

                                    <option
                                        value="booked"
                                        {{ $visit->status == 'booked' ? 'selected' : '' }}
                                    >
                                        booked
                                    </option>

                                    <option
                                        value="waiting"
                                        {{ $visit->status == 'waiting' ? 'selected' : '' }}
                                    >
                                        waiting
                                    </option>

                                    <option
                                        value="ongoing"
                                        {{ $visit->status == 'ongoing' ? 'selected' : '' }}
                                    >
                                        ongoing
                                    </option>

                                    <option
                                        value="completed"
                                        {{ $visit->status == 'completed' ? 'selected' : '' }}
                                    >
                                        completed
                                    </option>

                                    <option
                                        value="cancelled"
                                        {{ $visit->status == 'cancelled' ? 'selected' : '' }}
                                    >
                                        cancelled
                                    </option>

                                </select>

                            </form>

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

        </div>

    </div>

</div>

@endforeach

@endsection