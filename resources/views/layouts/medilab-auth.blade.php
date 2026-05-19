<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Medilab - Login')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #8fd3f4 0%, #3b6ea5 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
        }
        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .auth-card {
    background: rgba(255, 255, 255, 0.55);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);

    border-radius: 30px;

    box-shadow: 0 8px 32px rgba(0,0,0,0.15);

    border: 1px solid rgba(255,255,255,0.3);

    max-width: 600px;
    width: 100%;

    padding: 30px 25px;
    margin: 20px;
}
        .btn-primary {
    background: linear-gradient(45deg, #5b9df9 0%, #466b9e 100%);
    border: none;
    border-radius: 50px;
    padding: 14px 30px;
    font-weight: 600;
    font-size: 1.1rem;

    box-shadow: 0 6px 20px rgba(70,107,158,0.35);
}
        .logo {
            font-size: 2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #5b9df9, #466b9e);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-control {
    border-radius: 14px;
    padding: 10px 14px;
    border: 1px solid rgba(0,0,0,0.08);
    background: rgba(255,255,255,0.7);
}

    </style>
</head>
<body>
    <div class="auth-container">
        <div class="auth-card">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        </script>
<script>
function toggleRegisterPassword() {
    var x = document.getElementById("registerPassword");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function toggleConfirmPassword() {
    var x = document.getElementById("confirmPassword");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
<script>
function toggleLoginPassword() {
    var x = document.getElementById("loginPassword");

    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
</script>
</body>
</html>