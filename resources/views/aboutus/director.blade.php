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
      max-width: 550px;
      height: 100%;
      overflow: hidden;
      border-radius: 20px 100px 20px 100px;
      object-fit: cover;
      object-position: center;
    }
    
  </style>
</head>
<body>

<x-header title="Selamat Datang" />

<!-- <section class="py-5 welcome-section" id="welcome-section">
    <div class="mb-5 text-center">
      <h2 class="fw-bold" style="color: #B8141E;">ARCHIVE OF SIPA</h2>
    </div>

    <section class="archive-section">
      <div class="content-box">
        <div class="row align-items-center">
          <div class="col-md-6 d-flex justify-content-center">
            <div class="image-container">
              <img src="{{ asset('images/bundaira/BundaIRA.png') }}" alt="SIPA Performance" class="responsive-image">
            </div>
          </div>
          <div class="col-md-6">
            <h3 class="text-justify fw-bold" style="color: #B8141E;">Director’s Profile</h3>
              <p class="content-text">
              Irawati Kusumorasri, born in Solo in 1963, directs Solo International Performing Arts (SIPA), a prestigious festival since 2009 that showcases arts from Indonesia and abroad. She’s also a renowned traditional dancer, representing Indonesia globally in cultural missions.
              <br>
              <br>
              Irawati’s achievements include awards from the Ministry of Tourism, the Top 30 Event Calendar accolade, and the first prize from ABBI in 2020. She studied at Sebelas Maret University and ISI Surakarta, excelling in choreographies like “Oncot Srimpi Topeng Sumunar” and founded Semarak Candrakirana Art Center . . .
              </p>
          </div>
        </div>
      </div>
    </section>
</section> -->
<section class="py-5" id="welcome-section">
  <div class="container">
    <div class="row align-items-center">
      <!-- Kolom Kiri: Judul dan Deskripsi -->
      <div class="col-md-6 mb-4 mb-md-0">
        <h1 class="fw-bold display-5">@lang('messages.directors_profile')</h1>
        <h3 class="fw-semibold border-bottom pb-2 mb-4" style="font-size: 1.75rem;">
            Dr. R.Ay. Irawati Kusumorasri, M.Sn.
        </h3>
    </div>


      <!-- Kolom Kanan: Gambar dengan Caption -->
      <div class="col-md-6 text-center" style="padding-left: 20px;">
        <div class="position-relative  image-container">
          <img src="{{ asset('images/bundaira/BundaIRA.png') }}" alt="Direktur SIPA" class="img-fluid rounded shadow">
          <div class="position-absolute bottom-0 start-0 end-0 text-white p-2" style="background: rgba(0, 0, 0, 0.6);">
            <strong>@lang('messages.directors_profile')</strong><br>
            Dr. R.Ay. Irawati Kusumorasri, M.Sn.
          </div>
        </div>
      </div>
        <div class="col-12 mt-4">
            <p style="text-align: justify;">
                @lang('messages.directors_description_1')
            </p>
            <p style="text-align: justify;">
                @lang('messages.directors_description_2')
            </p>
            <p style="text-align: justify;">
                @lang('messages.directors_description_3')
            </p>
            <p style="text-align: justify;">
                @lang('messages.directors_description_4')
            </p>
            <p style="text-align: justify;">
                @lang('messages.directors_description_5')
            </p>
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