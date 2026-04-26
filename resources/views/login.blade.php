<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - CityCare Hospital</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <style>
    body {
      background-color: #f1f7fd; /* Warna background khas Medilab */
      font-family: "Open Sans", sans-serif;
    }
    .login-container {
      margin-top: 80px;
    }
    .card {
      border: none;
      border-radius: 15px;
      box-shadow: 0px 0px 20px rgba(25, 119, 204, 0.1);
    }
    .nav-pills .nav-link.active {
      background-color: #1977cc;
    }
    .nav-pills .nav-link {
      color: #2c4964;
      font-weight: 600;
    }
    .btn-primary {
      background-color: #1977cc;
      border: none;
      border-radius: 50px;
      padding: 10px 30px;
    }
    .btn-primary:hover {
      background-color: #166ab5;
    }
    .form-control:focus {
      border-color: #1977cc;
      box-shadow: none;
    }
    .hospital-logo {
      color: #2c4964;
      font-weight: 700;
      margin-bottom: 20px;
    }
  </style>
</head>
<body>

<div class="container login-container">
  <div class="row justify-content-center">
    <div class="col-md-5 text-center">
      <h2 class="hospital-logo">CityCare <span style="color: #1977cc;">Hospital</span></h2>
      
      <div class="card p-4 text-start">
        <ul class="nav nav-pills mb-4 justify-content-center" id="pills-tab" role="tablist">
          <li class="nav-item" role="presentation">
            <button class="nav-link active" id="pills-login-tab" data-bs-toggle="pill" data-bs-target="#pills-login" type="button" role="tab">Masuk</button>
          </li>
          <li class="nav-item" role="presentation">
            <button class="nav-link" id="pills-register-tab" data-bs-toggle="pill" data-bs-target="#pills-register" type="button" role="tab">Daftar</button>
          </li>
        </ul>

        <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-login" role="tabpanel">
            <form action="{{ url('/patient/dashboard') }}" method="GET">
  <div class="mb-3">
    <label class="form-label">No. Rekam Medis / NIK</label>
    <input type="text" class="form-control" placeholder="Contoh: 12.34.56 atau NIK KTP" required>
  </div>
  <div class="mb-3">
    <label class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Masukkan password" required>
  </div>
  <div class="d-grid">
    <button type="submit" class="btn btn-primary">Masuk ke Layanan</button>
  </div>
</form>
          </div>

          <div class="tab-pane fade" id="pills-register" role="tabpanel">
            <form action="#" method="POST">
              <div class="mb-3">
                <label class="form-label">NIK (Sesuai KTP)</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" required>
              </div>
              <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" required>
              </div>
              <div class="d-grid">
                <button type="submit" class="btn btn-primary">Daftar Akun Baru</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <div class="mt-4">
        <a href="{{ url('/') }}" class="text-decoration-none text-muted">← Kembali ke Beranda</a>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>