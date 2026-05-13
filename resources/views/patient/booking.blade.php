<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Pemeriksaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link
    rel="stylesheet"
    href="{{ asset('css/booking.css') }}"
    >

    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    
</head>
<body>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-8">

            <div class="card booking-card p-4">

                <div class="mb-4 text-center">
                    <h2 class="fw-bold text-primary">
                        Booking Pemeriksaan
                    </h2>

                    <p class="text-muted">
                        Lengkapi data dan lakukan booking pemeriksaan
                    </p>
                </div>

                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('patient.booking.store') }}" method="POST">

                    @csrf

                    @include('patient.partials.identity')

                     @include('patient.partials.booking')

                   

                    {{-- ========================= --}}
                    {{-- STEP 2 BOOKING --}}
                    {{-- ========================= --}}

                   

                </form>

            </div>

        </div>
    </div>

</div>

<script src="{{ asset('js/booking.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>



</body>
</html>