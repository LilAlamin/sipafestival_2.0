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
    .image-container {
      width: 100%;
      max-width: 800px;
      height: 100%;
      overflow: hidden;
      border-radius: 20px;
      object-fit: cover;
      object-position: center;
    }
  </style>
</head>
<body>

<x-header title="Selamat Datang" />

<section class="py-5" id="welcome-section">
  <div class="container text-center">
    <!-- Judul Dipindah ke Atas Gambar -->
    <h1 class="fw-bold display-5 mb-4">@lang('messages.history') Solo International Performing Arts (SIPA)</h1>

    <!-- Gambar Di Tengah -->
    <div class="d-flex justify-content-center mb-4">
      <div class="position-relative image-container">
        <img src="{{ asset('images/acara2024.png') }}" alt="Direktur SIPA" class="img-fluid rounded shadow">
        <div class="position-absolute bottom-0 start-0 end-0 text-white p-2" style="background: rgba(0, 0, 0, 0.6);">
          <strong>Solo International Performing Arts</strong><br>
          SIPA 2024
        </div>
      </div>
    </div>

    <!-- Deskripsi -->
    <div class="text-start">
      <p style="text-align: justify;">
        @lang('messages.history_description_1')
      </p>
      <p style="text-align: justify;">
        @lang('messages.history_description_2')
      </p>
      <p style="text-align: justify;">
        @lang('messages.history_description_3')
      </p>
      <p style="text-align: justify;">
        @lang('messages.history_description_4')
      </p>
    </div>
<h2 class="fw-bold display-6 mt-5 mb-3">@lang('messages.ebook')</h2>
<div class="flipbook-embed-container">
    <iframe src="https://heyzine.com/flip-book/d3da65815a.html"
            width="100%"
            height="100%"
            frameborder="0"
            allowfullscreen>
    </iframe>
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