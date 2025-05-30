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
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/js/main.js') }}">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-custom shadow-sm fixed-top" style="transition: top 0.3s;">
  <div class="container">
    <a class="navbar-brand" href="#">
      <img src="{{ asset('images/sipalogo.png') }}" alt="SIPA Logo">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link fw-bold {{ request()->is('/') ? 'active' : '' }}" href="/">HOME</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link {{ request()->is('aboutus*') ? 'active' : '' }}" href="#" id="aboutDropdown"
             role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ABOUT US
          </a>
          <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
            <li><a class="dropdown-item" href="/aboutus/director">DIRECTOR PROFILE</a></li>
            <li><a class="dropdown-item" href="/aboutus/history">HISTORY OF SIPA</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold {{ request()->is('lineup') ? 'active' : '' }}" href="/lineup">LINE UP</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link fw-bold {{ request()->is('gallery*') ? 'active' : '' }}" href="#" id="galleryDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            GALLERY
          </a>
          <ul class="dropdown-menu" aria-labelledby="galleryDropdown">
            @for ($year = 2024; $year >= 2009; $year--)
              <li><a class="dropdown-item" href="/gallery/{{ $year }}">SIPA {{ $year }}</a></li>
            @endfor
          </ul>
        </li>
        <li class="nav-item">
          <a class="lang-switch" href="{{ route('lang.switch', app()->getLocale() == 'id' ? 'en' : 'id') }}">
            {{ app()->getLocale() == 'id' ? 'EN' : 'ID' }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</body>
</html>