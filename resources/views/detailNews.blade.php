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
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/js/main.js') }}">
  <style>
    body {
      background-image: url('{{ asset('images/pattern/bgsipa.webp') }}');
      background-repeat: repeat;
      background-size: auto;
      background-color: white;
    } 
  </style>
</head>
<body>
<x-header title="Selamat Datang" />

<section class="py-5 welcome-section" id="welcome-section">
  <div class="container welcome-container" id="welcome-section">
    <h1 class="text-center fw-bold" style="color: #B8141E;">{{ $news->title }}</h1>
      <h2 class="text-center fw-medium mb-5" style="color: #B8141E;">Let’s make new journey on SIPA</h2>

      <div class="row mb-5 align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">SIPA 2024</h2>
          <p class="text-muted">{{ $news->created_at->translatedFormat('d F Y H:i') }}</p>
            <p style="text-align: justify;">
              {{ $news->description }}
            </p>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div id="slider" class="position-relative overflow-hidden rounded" style="max-width: 100%;">
            <img src="{{ asset('/images/news/' . $news->image_path) }}" class="img-slide img-fluid w-100 d-block" alt="Slide 1">
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