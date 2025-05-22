<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sipafestival 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
    .navbar-brand img {
      max-height: 65px;
    }
    .navbar-custom {
      background: white;
      border-bottom: 3px solid #B8141E;
    }
    .navbar-nav .nav-link {
      color: black !important;
      font-weight: bold;
      margin-left: 1.2rem;
      transition: all 0.3s ease;
      position: relative;
      text-transform: uppercase;
    }
    .navbar-nav .nav-link:hover {
      color: #B8141E !important;
    }
    .navbar-nav .nav-link.active {
      color:#B8141E !important;
    }
    .navbar-toggler {
      border: none;
    }
    .navbar-toggler-icon {
      background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280,0,0,0.7%29' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }
    /* Show dropdown on hover */



    .dropdown-menu {
  display: block;
  transform: scaleY(0);
  transform-origin: top;
  transition: transform 0.3s ease, opacity 0.3s ease;
  opacity: 0;
  visibility: hidden;
  pointer-events: none;
}

    .nav-item.dropdown:hover .dropdown-menu {
      display: block!important;
      opacity: 1!important;
      visibility: visible!important;
      transform: scaleY(1)!important;
      pointer-events: auto!important;
    }

    .dropdown-menu {
      border-radius: 12px!important;
      background-color: #fff!important;
      box-shadow: 0 8px 16px rgba(0,0,0,0.1)!important;
      display: block!important;
      transform: scaleY(0)!important;
      transform-origin: top!important;
      transition: transform 0.5s ease, opacity 0.5s ease!important;
      opacity: 0!important;
      visibility: hidden!important;
      pointer-events: none!important;
    }

    .dropdown-item {
      color: #000 !important;
      font-weight: bold !important;
    }

    .dropdown-item:hover {
      color: #B8141E!important;
      background-color: #ffffff!important;
    }

    .nav-link:focus,
    .nav-link:active,
    .dropdown-item:focus,
    .dropdown-item:active {
      background-color: transparent !important;
      color: #B8141E !important;
      outline: none!important;
      box-shadow: none!important;
    }

  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <!-- <li class="nav-item"><a class="nav-link fw-bold" href="/">HOME</a></li>
        <li class="nav-item"><a class="nav-link fw-bold" href="/lineup">LINE UP</a></li>
        <li class="nav-item"><a class="nav-link fw-bold" href="/aboutus">ABOUT US</a></li>
        <li class="nav-item"><a class="nav-link fw-bold" href="/faq">FAQ</a></li>
        <li class="nav-item"><a class="nav-link fw-bold" href="/admin/login">Login</a></li> -->

        <a class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}" href="/">HOME</a>
        <li class="nav-item dropdown">
          <a class="nav-link  {{ request()->is('aboutus*') ? 'active' : '' }}" href="#" id="aboutDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ABOUT US
          </a>
          <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
            <li><a class="dropdown-item" href="/aboutus/director">DIRECTOR PROFILE</a></li>
            <li><a class="dropdown-item" href="/aboutus/history">HISTORY OF SIPA</a></li>
          </ul>
        </li>
          <a class="nav-link fw-bold {{ request()->is('lineup') ? 'active' : '' }}" href="/lineup">LINE UP</a>
          <li class="nav-item dropdown">
          <a class="nav-link fw-bold {{ request()->is('gallery*') ? 'active' : '' }}" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            GALLERY
          </a>
          <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
            <li><a class="dropdown-item" href="/gallery/2024">SIPA 2024</a></li>
            <li><a class="dropdown-item" href="/gallery/2023">SIPA 2023</a></li>
            <li><a class="dropdown-item" href="/gallery/2022">SIPA 2022</a></li>
            <li><a class="dropdown-item" href="/gallery/2021">SIPA 2021</a></li>
            <li><a class="dropdown-item" href="/gallery/2020">SIPA 2020</a></li>
            <li><a class="dropdown-item" href="/gallery/2019">SIPA 2019</a></li>
            <li><a class="dropdown-item" href="/gallery/2009-2018">SIPA 2009-2018</a></li>
              
              
              
              
              
              
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>