<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">

    <h2 class="mb-4">Booking Pemeriksaan</h2>

    <form action="{{ route('patient.booking.store') }}" method="POST">

        @csrf

        {{-- PASIEN BARU --}}
        @if(!$patient)

            <div class="mb-3">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control">
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-laki">Laki-laki</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Alamat</label>
                <textarea name="alamat" class="form-control"></textarea>
            </div>

        @else

            {{-- PASIEN LAMA --}}
            <div class="alert alert-success">
                Data pasien ditemukan: <strong>{{ $patient->nama }}</strong>
            </div>

        @endif

        <hr>

        {{-- FORM BOOKING --}}
        <div class="mb-3">
            <label>Tanggal Pemeriksaan</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Poli</label>
            <select name="poli" class="form-control">
                <option value="Poli Umum">Poli Umum</option>
                <option value="Poli Gigi">Poli Gigi</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Dokter</label>
            <input type="text" name="dokter" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">
            Booking Sekarang
        </button>

    </form>

</div>

</body>
</html>