<style>
  /* Styling khusus tombol login agar terlihat spesial */
  .navmenu .btn-login-nav {
    background: #1977cc;
    color: #fff !important;
    padding: 8px 25px !important;
    margin-left: 15px;
    border-radius: 50px;
    border: 2px solid #1977cc;
    transition: 0.3s all;
    font-weight: 500;
  }

  /* Efek hover (saat kursor nempel) */
  .navmenu .btn-login-nav:hover {
    background: transparent !important;
    color: #1977cc !important;
    border: 2px solid #1977cc;
  }

  /* Responsif: kalau di HP, hilangkan margin kiri */
  @media (max-width: 1199px) {
    .navmenu .btn-login-nav {
      margin: 10px 20px !important;
      display: inline-block;
      text-align: center;
    }
  }
</style>

<nav id="navmenu" class="navmenu">
  <ul>
    <li><a href="{{ url('/') }}" class="active">Home</a></li>
    <li><a href="#about">About</a></li>
    <li><a href="#services">Services</a></li>
    <li><a href="#departments">Departments</a></li>
    <li><a href="#doctors">Doctors</a></li>
    
    <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
      <ul>
        <li><a href="#">Dropdown 1</a></li>
        <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Deep Dropdown 1</a></li>
            <li><a href="#">Deep Dropdown 2</a></li>
            <li><a href="#">Deep Dropdown 3</a></li>
            <li><a href="#">Deep Dropdown 4</a></li>
            <li><a href="#">Deep Dropdown 5</a></li>
          </ul>
        </li>
        <li><a href="#">Dropdown 2</a></li>
        <li><a href="#">Dropdown 3</a></li>
        <li><a href="#">Dropdown 4</a></li>
      </ul>
    </li>
    <li><a href="#contact">Contact</a></li>

    <li><a class="nav-link scrollto appointment-btn" 
       href="{{ route('login') }}" 
       style="background: #1977cc; color: #fff; border-radius: 50px; margin: 0 5px; padding: 8px 25px;">
       Login
    </a></li>
    <li><a class="nav-link scrollto appointment-btn" 
       href="{{ route('register') }}" 
       style="background: #fff; color: #1977cc; border-radius: 50px; margin: 0 5px; padding: 8px 25px; border: 2px solid #1977cc;">
       Register
    </a></li>
  </ul>
  <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
</nav>