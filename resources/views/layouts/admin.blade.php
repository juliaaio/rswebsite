<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Admin Panel</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
    >

    <style>

        body{background:#f4f7fc;font-family:Arial,sans-serif;}

        .sidebar{
            width:260px;min-height:100vh;
            background:linear-gradient(180deg,#1977cc,#0b5ed7);
        }

        .sidebar .logo{
            font-size:24px;font-weight:bold;color:#fff;
        }

        .sidebar .nav-link{
            color:rgba(255,255,255,.85);
            border-radius:10px;
            margin-bottom:8px;
            padding:12px 15px;
            transition:.3s;
        }

        .sidebar .nav-link:hover{
            background:rgba(255,255,255,.15);color:#fff;
        }

        .sidebar .nav-link.active{
            background:#fff;color:#1977cc;font-weight:600;
        }

        .topbar{
            background:#fff;border-bottom:1px solid #e5e7eb;
            padding:15px 25px;
        }

        .content-wrapper{padding:25px;}

        .dashboard-card{
            background:#fff;border-radius:18px;padding:25px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
            transition:.3s;
        }

        .dashboard-card:hover{
            transform:translateY(-3px);
        }

        .dashboard-card .icon{
            width:55px;height:55px;border-radius:12px;
            display:flex;align-items:center;justify-content:center;
            font-size:24px;color:#fff;
        }

        .bg-soft-blue{background:#1977cc;}
        .bg-soft-green{background:#20c997;}
        .bg-soft-orange{background:#fd7e14;}

        .page-title{
            font-size:28px;font-weight:700;color:#2d3748;
        }

        .table-container{
            background:#fff;border-radius:18px;padding:20px;
            box-shadow:0 2px 10px rgba(0,0,0,.05);
        }

        .status-badge{
            padding:8px 12px;border-radius:999px;
            font-size:13px;font-weight:600;
        }

        .status-booked{background:#e3f2fd;color:#1976d2;}
        .status-waiting{background:#fff3cd;color:#856404;}
        .status-ongoing{background:#d1ecf1;color:#0c5460;}
        .status-completed{background:#d4edda;color:#155724;}
        .status-cancelled{background:#f8d7da;color:#721c24;}

    </style>

</head>

<body>

    <div class="d-flex">

        <!-- SIDEBAR -->
        <div class="sidebar p-4">

            <div class="logo mb-5">
                MediLab Admin
            </div>

            <ul class="nav flex-column">

                <li class="nav-item">

                    <a
                        href="/admin/dashboard"
                        class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                    >

                        <i class="bi bi-grid-fill me-2"></i>

                        Dashboard

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        href="/admin/visits"
                        class="nav-link {{ request()->is('admin/visits') ? 'active' : '' }}"
                    >

                        <i class="bi bi-calendar-check me-2"></i>

                        Bookings

                    </a>

                </li>

                <li class="nav-item">

                    <a
                        href="{{ route('admin.patients') }}"
                        class="nav-link {{ request()->routeIs('admin.patients') ? 'active' : '' }}"
                    >

                        <i class="bi bi-people-fill me-2"></i>

                        Patients

                    </a>

                </li> 

                <li class="nav-item">
                    <a
                        href="#"
                        class="nav-link"
                    >
                        <i class="bi bi-person-badge-fill me-2"></i>
                        Doctors
                    </a>
                </li>

            </ul>

        </div>


        <!-- MAIN -->
        <div class="flex-grow-1">

            <!-- TOPBAR -->
            <div class="topbar d-flex justify-content-between align-items-center">

                <h5 class="mb-0 fw-bold">
                    Hospital Management System
                </h5>

                <div class="d-flex align-items-center gap-3">

                    <span class="fw-semibold">
                        {{ auth()->user()->name }}
                    </span>

                    <form
                        action="{{ route('logout') }}"
                        method="POST"
                    >
                        @csrf

                        <button class="btn btn-outline-danger btn-sm">
                            Logout
                        </button>

                    </form>

                </div>

            </div>


            <!-- CONTENT -->
            <div class="content-wrapper">

                @yield('content')

            </div>

        </div>

    </div>

</body>

</html>