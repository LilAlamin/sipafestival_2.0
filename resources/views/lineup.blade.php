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
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/js/main.js') }}">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }
    body {
      background-image: url('{{ asset('images/pattern/bgsipa.webp') }}');
      background-repeat: repeat;
      background-size: auto;
      background-color: white;
    }
    .header-section img.bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      opacity: 0.4;
    }
    .delegates-img {
      width: 100%;           /* Biar gambar full lebar kolom */
      height: 100%;          /* Tinggi tetap seragam */
      object-fit: cover;      /* Gambar crop rapi tanpa gepeng */
      border-radius: 10px;    /* Biar sudut gambar membulat */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Tambah bayangan halus */
      transition: transform 0.3s ease; /* Smooth hover effect */
    }

    .delegates-img:hover {
      transform: scale(1.05); /* Pas hover gambar membesar sedikit */
    }
    .card-body {
      margin-top: 20px; /* jarak antara gambar dan tulisan */
    }

    .card-title {
      font-size: 1rem;
      color: #B8141E;
    }
    .info-card {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border: none;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .info-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    }

    .info-card .icon {
      font-size: 2.5rem;
    }

    .info-card .label {
      margin-top: 10px;
      font-weight: 600;
      font-size: 1.1rem;
    }

    @media (max-width: 576px) {
      .info-card .icon {
        font-size: 2rem;
      }
    }
  </style>
</head>
<body>

@include('components.header')

<!-- Lineup Section -->
<section style="color: #B8141E; padding: 60px 20px;">
  <div class="container text-center">
    <h2 class="fw-bold mb-2" style="font-size: 36px;">LINEUP INFORMATION</h2>
    <h5 class="mb-4" style="color: #000;">AMBASADOR SIPA FESTIVAL PERFORMANCE</h5>
    
    <!-- <div class="card mb-5" style="background-color: #7e001c; border: 3px solid #f8d98d; border-radius: 20px; overflow: hidden;">
      <img src="{{ asset('images/ambasador.png') }}" alt="Ambasador SIPA" class="img-fluid">
      <div class="card-body">
        <h4 class="card-title fw-bold" style="color: #f8d98d;">GRAj. Ancillasura Marina Sudjiwo.</h4>
        <a href="#" class="btn btn-outline-light mt-3">SEE THE DETAILS</a>
      </div>
    </div> -->

    <!-- International Delegates -->
    <div class="p-4" style="background-color: #ffeab3; border-radius: 40px;">
      <h4 class="fw-bold mb-4 text-center" style="color: #B8141E;">INTERNATIONAL DELEGATES</h4>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 ">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="Park Na Hoon Company">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 ">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="ART8">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 ">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="Hanayura">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>

      </div>
    </div>


    <!-- Indonesian Delegates -->
    <div class="p-4 mt-5" style="background-color: #ffeab3; border-radius: 40px;">
      <h4 class="fw-bold mb-4 text-center" style="color: #B8141E;">INDONESIAN DELEGATES</h4>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="Mahoni Musik">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="Darmawan Dadjiono">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100">
            <img src="{{ asset('images/delegates/TBA.png') }}" class="delegates-img" alt="Artmay Studio">
            <div class="card-body text-center">
              <h6 class="card-title fw-bold">TBA</h6>
            </div>
          </div>
        </div>
    </div>
  </div>
</section>

<x-footer />

<script>
  /*Navbar*/
  document.addEventListener('DOMContentLoaded', function() {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    const showAreaHeight = 50; // area atas layar untuk mouseover

    if (!navbar) return;

    window.addEventListener('scroll', function() {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if(scrollTop > lastScrollTop && scrollTop > 100){
        // scroll down → sembunyikan navbar
        navbar.style.top = '-80px';
      } else {
        // scroll up → tampilkan navbar
        navbar.style.top = '0';
      }

      lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
    });

    window.addEventListener('mousemove', function(e) {
      if (e.clientY <= showAreaHeight) {
        navbar.style.top = '0';
      }
    });
  });


</script>
</body>
</html>