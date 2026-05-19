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

<div class="booking-wrapper">

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