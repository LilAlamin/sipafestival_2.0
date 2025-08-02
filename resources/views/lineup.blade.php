<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sipafestival 2025</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  {{-- These asset links are placeholders for your Laravel project --}}
  {{-- <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}"> --}}
  {{-- <link rel="stylesheet" href="{{ asset('assets/js/main.js') }}"> --}}
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
      width: 100%;           /* Fill the column width */
      height: 250px;          /* Set a fixed height for consistency on desktop */
      object-fit: cover;      /* Crop the image neatly without distortion */
      border-radius: 10px;    /* Rounded corners */
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
      transition: transform 0.3s ease; /* Smooth hover effect */
    }
    .delegates-img:hover {
      transform: scale(1.05); /* Slightly enlarge image on hover */
    }
    .card-body {
      margin-top: 15px; /* Adjust spacing between image and text */
    }
    .card-title {
      font-size: 1.1rem; /* Slightly larger for better readability */
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

    /* --- Mobile Responsive Styles --- */
    @media (max-width: 768px) {
        .lineup-section {
            padding: 40px 15px; /* Reduce padding for tablets and mobile */
        }
    }

    @media (max-width: 576px) {
      .info-card .icon {
        font-size: 2rem;
      }
      .lineup-section h2.fw-bold {
        font-size: 28px; /* Reduce title font size */
      }
      .delegates-container {
        padding: 20px; /* Reduce inner padding */
      }
      .delegates-img {
        height: auto; /* Allow image height to adjust to maintain aspect ratio */
      }
      .card.h-100 {
        text-align: center; /* Ensure content is centered */
      }
    }
  </style>

</head>

<body>
<x-header title="Selamat Datang" />


<section class="lineup-section" style="color: #B8141E; padding: 60px 20px;">
  <div class="container text-center">
    <h2 class="fw-bold mb-2" style="font-size: 36px;">@lang('messages.line_up')</h2>
    <h5 class="mb-4" style="color: #000;">@lang('messages.ambassador')</h5>

    <div class="p-4 delegates-container" style="background-color: #ffeab3; border-radius: 40px;">
      <h4 class="fw-bold mb-4 text-center" style="color: #B8141E;">@lang('messages.international_delegation')</h4>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Khambatta Dance Company.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Khambatta Dance Company</h6>
              <p class="card-text">United States of America</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/PARRA.DICE.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">PARRA.DICE</h6>
              <p class="card-text">Netherlands</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Sanggar Kirana.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Sanggar Kirana</h6>
              <p class="card-text">Malaysia</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/SNU.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Seoul National University</h6>
              <p class="card-text">South Korea</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Colectivo Glovo.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Colectivo Glovo</h6>
              <p class="card-text">Spanyol</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Dongbaek.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Dongbaek Carnival</h6>
              <p class="card-text">South Korea</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/POD Dance.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">POD Dance Project</h6>
              <p class="card-text">South Korea</p>
            </div>
          </div>
        </div>  
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Kolaborasi SxI.png') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Dr Danny Tan</h6>
              <h4 class="card-title">Kolaborasi Singapore x Indonesia</h4>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Kolaborasi.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Fajar Satriadi</h6>
              <h4 class="card-title">Kolaborasi Singapore x Indonesia</h4>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="p-4 mt-5 delegates-container" style="background-color: #ffeab3; border-radius: 40px;">
      <h4 class="fw-bold mb-4 text-center" style="color: #B8141E;">@lang('messages.indonesian_delegation')</h4>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Noizekilla.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Noizekilla</h6>
              <p class="card-text">Bali</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Samohung.png') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Samohung</h6>
              <p class="card-text">Trenggalek</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card h-100 border-0 shadow-sm">
            <img src="{{ asset('images/delegates/Sanggar Seni Lepas.jpg') }}" class="delegates-img" alt="Delegate TBA">
            <div class="card-body">
              <h6 class="card-title fw-bold">Sanggar Seni Lepas</h6>
              <p class="card-text">South Korea</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
<script>
  /* Navbar Scroll Behavior */
  document.addEventListener('DOMContentLoaded', function() {
    let lastScrollTop = 0;
    const navbar = document.querySelector('.navbar');
    const showAreaHeight = 50; // Top area of the screen for mouseover

    // Exit if no navbar is found
    if (!navbar) return;

    window.addEventListener('scroll', function() {
      let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

      if (scrollTop > lastScrollTop && scrollTop > 100) {
        // Scroll down -> hide navbar
        navbar.style.top = '-80px';
      } else {
        // Scroll up -> show navbar
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