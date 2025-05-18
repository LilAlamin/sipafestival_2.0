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
  <style>
    /*BODY*/
    * {
      font-family: 'Poppins', sans-serif;
    }
    body {
      background-image: url('{{ asset('images/pattern/BGSIPA.png') }}');
      background-repeat: repeat;
      background-size: auto;
      background-color: white;
    }

    /* HEADER */
    .header-section {
      position: relative;
      overflow: hidden;
      height: 100vh;
      color: #F0D97B;
    }

    .header-section img.bg {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
      mask-image: linear-gradient(to bottom, rgba(0,0,0,1),rgba(0,0,0,1), rgba(0,0,0,0));
      -webkit-mask-image: linear-gradient(to bottom, rgba(0,0,0,1),rgba(0,0,0,1), rgba(0,0,0,0));
    }

    .header-section .container {
      position: absolute;
      top: 20%;
      left: 5%;
      max-width: 600px;
      z-index: 1;
      display: flex;
      flex-direction: column;
      gap: 1rem;
    }

    .header-section img.text {
      width: 130%;
      height: auto;
    }

    .header-section p {
      font-size: 1.5rem;
      font-weight: bold;
      margin: 0;
    }

    /* CUSTOM BUTTON */
    .btn-findmore {
      background-color: transparent !important;
      color: #F0D97B !important;
      border: 2px solid #F0D97B !important;
      border-radius: 12px !important;
      font-size: 15px;
      padding: 10px 20px;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
      text-align: center;
      width: auto;
      max-width: 200px;
      z-index: 10;
      position: relative;
      opacity: 1;
    }

    .btn-findmore:hover {
      background-color: #F0D97B !important;
      color: #000 !important;
    }

    .btn-findmore2 {
      background-color: transparent !important;
      color: #B8141E !important;
      border: 2px solid #B8141E !important;
      border-radius: 12px !important;
      font-size: 15px;
      padding: 10px 20px;
      font-weight: bold;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-block;
      text-align: center;
    }

    .btn-findmore2:hover {
      background-color: #B8141E !important;
      color: #ffffff !important;
    }

    /* SLIDER IMG */
    <style>
    .img-slide {
      position: absolute;
      top: 0;
      left: 0;
      transition: opacity 5s ease-in-out;
      width: 80%;
      height: 80%;
      object-fit: contain;
      transition: opacity 1s ease-in-out;
      opacity: 0;
      z-index: 0;
    }
    .img-slide.active {
      opacity: 1;
      z-index: 1;
    }
    #slider {
      width: 90%;
      max-width: 700px;
      height: 500px;
      position: relative;
      overflow: hidden;
    }
    .welcome-container {
      padding-top: 100px;
    }

    /* PLAY VIDEO */
    .play-button {
      width: 100px;
      height: 100px;
      background: #B8141E;
      border: 2px solid #B8141E;
      border-radius: 50%;
      backdrop-filter: blur(8px);
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      transition: all 0.4s ease;
      box-shadow: 0 0 20px #B8141E;
      animation: pulse 2s infinite;
    }

    .play-button i {
      font-size: 50px;
      color: #ffffff;
      transition: all 0.3s ease;
    }

    .play-button:hover {
      background: rgba(255, 255, 255, 0.5);
      box-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(184, 20, 30, 0.5);
      transform: scale(1.05);
    }

    .play-button:hover i {
      color: #8d0f16;
      
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(184, 20, 30, 0.5);
      }
      70% {
        box-shadow: 0 0 0 20px rgba(184, 20, 30, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(184, 20, 30, 0);
      }
    }

    /* MASKOT (AWALNYA DELEAGATE) */
    .delegate-container {
      position: relative;
      overflow: hidden;
    }

    .delegates-wrapper {
      display: flex;
      transition: transform 0.5s ease;
    }

    .delegate-item {
      flex-shrink: 0;
      width: 220px;
      margin: 0 15px; /* Lebih konsisten daripada mx-3 */
      text-align: center;
    }

    .delegate-item img {
      width: 200px;
      height: 150px;
      object-fit: cover;
      border-radius: 12px;
    }

    .delegate-item p {
      margin-top: 5px;
      font-weight: bold;
      font-size: 16px;
    }

    /* MAPS */
    .map-frame {
      width: 100%;
      height: 250px;
      border: 0;
      border-radius: 1rem; /* Rounded corner seperti Bootstrap rounded */
    }        
    .arc-section {
      padding-top: 70px;
    }
    .welcome-section p {
      font-size: 1.3rem;
    }
    .custom-rounded {
      border-radius: 40px;
      overflow: hidden;
    }

    

    /*SPONSORMEDPART*/
    .sponsor-container {
      background-color: #ffe19d;
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .logo-besar {
      max-width: 100px;
    }

    .logo-sedang {
      max-width: 70px;
    }

    .logo-kecil {
      max-width: 50px;
    }
    .sponsor-logo {
      height: auto;
      object-fit: contain;
    }

    .medpart-container {
      background-color: #ffe19d; /* warna kuning background */
      border-radius: 20px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .medpart-logo {
      height: auto;
      object-fit: contain;
    }

    /*FAQ*/
    .arc-section h2 {
      margin-bottom: 20px;
    }
    .accordion-button {
      font-family: 'Poppins', sans-serif;
      font-size: 20px !important;
    }
    .accordion-button {
        background-color: #f9f9f9;
        color: #B8141E;
        font-size: 1rem;
        transition: background-color 0.3s ease;
      }
      .accordion-body {
        background-color: #fffefc;
        border-left: 4px solid #ffe19d;
        padding: 1rem 1.25rem;
        font-size: 16px;
      }
      .accordion-button.collapsed {
        border: 1px solid #ffe19d!important;
        border-radius: 15px!important;  
        background-color: #fff;    /* pastikan tetap putih */
      }
      .accordion-item {
        border: none;
        border-radius: 15px!important;
        overflow: hidden;
        margin-bottom: 0.5rem;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
      }
      .accordion-button::after {
        content: "\f078"; /* FontAwesome down arrow */
        font-weight: 900;
        margin-left: auto;
        transition: transform 0.3s ease;
      }
      .accordion-button.collapsed::after {
        transform: rotate(0deg);
      }
      .accordion-button:not(.collapsed)::after {
        transform: rotate(180deg);
      }
      .accordion-button:not(.collapsed) {
        background-color: #ffe19d !important;
        color:#000 !important;
        box-shadow: none !important;
      }
</style>
</head>
<body>

<x-header title="Selamat Datang" />

<!-- Header -->
<section class="text-justify py-5 header-section">
  <img src="{{ asset('images/pattern/org.png') }}" alt="Background" class="bg">
  <div class="container">
    <img src="{{ asset('images/pattern/sipa2025ku.png') }}" alt="SIPA Logo" class="text" style="max-height: 450px;">
    <p class="fw-bold mb-2">4 · 5 · 6 SEPTEMBER 2025</p>
    <div id="countdown" style="font-size: 2.5rem; font-weight: 600;">
      00:00:00:00
    </div>
    <a href="#welcome-section" class="btn btn-findmore mt-4 fw-bold">FIND MORE</a>
  </div>
</section>

<!-- SIPA Experience -->
<section class="py-5 welcome-section" id="welcome-section">
  <div class="container welcome-container" id="welcome-section">
      <h1 class="text-center fw-bold" style="color: #B8141E;">WELCOME TO SIPA!</h1>
      <h1 class="text-center fw-bold" style="color: #B8141E;">PERFORMING ROYAL GENESIS</h1>
      <h2 class="text-center fw-medium mb-5" style="color: #B8141E;">Let’s make new journey on SIPA</h2>

      <div class="row mb-5 align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">Who We Are?</h2>
            <p style="text-align: justify;">
                    Solo International Performing Arts (SIPA) 2025 merupakan ajang tahunan yang merayakan keindahan seni pertunjukan dari berbagai belahan dunia. Digelar di Kota Solo, SIPA 2025 menyuguhkan beragam pertunjukan menarik, mulai dari tarian tradisional hingga pertunjukan kontemporer yang inovatif. 
                    Dengan mengangkat tema <strong><em>"Performing Royal Genesis"</em></strong> dan menjadikan Gusti Sura sebagai maskot, SIPA 2025 berhasil menyoroti kekayaan budaya Jawa sekaligus menghadirkan nuansa modern.
            </p>
          <a href="/aboutus" class="btn btn-findmore2 mt-4 px-4 py-2 fw-bold">FIND OUT MORE</a>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div id="slider" class="position-relative overflow-hidden rounded" style="max-width: 100%;">
            <img src="{{ asset('images/sliderwelcome/w.slide 1.png') }}" class="img-slide img-fluid w-100 d-block" alt="Slide 1">
            <img src="{{ asset('images/sliderwelcome/w.slide 2.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 2">
            <img src="{{ asset('images/sliderwelcome/w.slide 3.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 3">
            <img src="{{ asset('images/sliderwelcome/w.slide 4.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 4">
            <img src="{{ asset('images/sliderwelcome/w.slide 5.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 5">
          </div>
        </div>
      </div>


    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color: #B8141E;">ON SIPA LAST YEAR</h2>
      <div class="position-relative d-inline-block mt-4" style="cursor: pointer; max-width: 2560px;">
        <div id="thumbnail" onclick="openVideo()" style="position: relative;">
          <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded-5" alt="On SIPA Last Year">
          <div class="play-button position-absolute top-50 start-50 translate-middle">
            <span class="circle"></span>
            <i class="bi bi-play-fill"></i>
          </div>
        </div>
        <iframe id="videoIframe" width="1280" height="720"
                src="https://www.youtube.com/embed/rJtSeMMQY9g"
                title="YouTube video" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen
                class="rounded-5" style="display: none;"></iframe>
      </div>
    </div>

    <div class="arc-section mb-5 text-center">
      <h2 class="fw-bold" style="color: #B8141E;">MASKOT SIPAFESTIVAL</h2>
      <div class="carousel slide mx-auto carousel-margin" data-bs-ride="carousel" data-bs-interval="3000" style="max-width: 600px;">
        <div class="carousel-inner custom-rounded">
          <div class="carousel-item active">
            <img src="{{ asset('images/2024.png') }}" class="d-block w-100" alt="Gambar 1">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/2023.png') }}" class="d-block w-100" alt="Gambar 2">
          </div>
          <div class="carousel-item">
            <img src="{{ asset('images/2024.png') }}" class="d-block w-100" alt="Gambar 3">
          </div>
        </div>
        <p class="mt-3" style="font-size: 18px;">
          <span class="fw-bold">2009</span><br>
          <span class="fw-normal">SIPAfestival</span>
        </p>
      </div>
    </div>
    <div class="delegates-section text-center my-5">
      <div class="delegate-container position-relative" style="overflow: hidden;">
        <div id="delegatesContainer" class="delegates-wrapper">
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2009</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2010</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2011</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2012</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2013</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2014</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2015</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2016</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2017</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2018</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2019</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2020</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2021</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2022</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2023</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2024</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
          <div class="delegate-item text-center flex-shrink-0 mx-3">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
            <p class="mt-2" style="font-size: 16px;">
              <span class="fw-bold">2024</span><br>
              <span class="fw-normal">SIPAfestival</span>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="arc-section mb-5 text-center">
      <h2 class="fw-bold" style="color: #B8141E;">NEWS SIPA</h2>
      <h4 class="text-center fw-medium mb-5" style="color: #B8141E;">Update news about SIPA</h4>
    </div>

    <div class="row mb-5">
      <!-- Berita 1 -->
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="position-relative">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" class="card-img-top rounded-top" alt="Launching Poster">
            <span class="badge bg-success position-absolute top-0 end-0 m-2">Event</span>
          </div>
          <div class="card-body">
            <small class="text-muted d-block mb-2">Senin, 22 Juli 2024 02:38 WIB</small>
            <h6 class="fw-bold">
              Launching Poster dan Tema Wayang Jogja Night Carnival #9
            </h6>
            <a href="#" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Berita 2 -->
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="position-relative">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" class="card-img-top rounded-top" alt="Launching Poster">
            <span class="badge bg-success position-absolute top-0 end-0 m-2">Event</span>
          </div>
          <div class="card-body">
            <small class="text-muted d-block mb-2">Senin, 22 Juli 2024 02:38 WIB</small>
            <h6 class="fw-bold">
              Launching Poster dan Tema Wayang Jogja Night Carnival #9
            </h6>
            <a href="#" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Berita 3 -->
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="position-relative">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" class="card-img-top rounded-top" alt="Launching Poster">
            <span class="badge bg-success position-absolute top-0 end-0 m-2">Event</span>
          </div>
          <div class="card-body">
            <small class="text-muted d-block mb-2">Senin, 22 Juli 2024 02:38 WIB</small>
            <h6 class="fw-bold">
              Launching Poster dan Tema Wayang Jogja Night Carnival #9
            </h6>
            <a href="#" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
          </div>
        </div>
      </div>

      <!-- Berita 4 -->
      <div class="col-md-3 mb-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="position-relative">
            <img src="{{ asset('images/delegates/delegates 1.png') }}" class="card-img-top rounded-top" alt="Launching Poster">
            <span class="badge bg-success position-absolute top-0 end-0 m-2">Event</span>
          </div>
          <div class="card-body">
            <small class="text-muted d-block mb-2">Senin, 22 Juli 2024 02:38 WIB</small>
            <h6 class="fw-bold">
              Launching Poster dan Tema Wayang Jogja Night Carnival #9
            </h6>
            <a href="#" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container py-5">
    <!-- Section Title -->
    <div class="text-center mb-4">
      <h5 class="text-danger fw-bold">We’d love to hear from you</h5>
      <h5 class="fw-bold">@SIPAFESTIVAL</h5>
    </div>

    <!-- Location and Map -->
    <div class="row mb-5 align-items-center">
      <div class="col-md-6">
        <h6 class="text-danger fw-bold">LOCATION</h6>
        <p class="fw-bold">Address</p>
        <p>Jl. Kedasih No.22, <br>Kerten, Laweyan, Solo, Central Java, INA</p>
      </div>
      <div class="col-md-6">
        <iframe 
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3955.036946214386!2d110.8030478153319!3d-7.556823776742838!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a16928e142857%3A0x26507e3dc48d8705!2sJl.%20Kedasih%20No.22%2C%20Kerten%2C%20Laweyan%2C%20Surakarta%20City%2C%20Central%20Java%2057122%2C%20Indonesia!5e0!3m2!1sen!2sid!4v1714294488071!5m2!1sen!2sid" 
          class="map-frame" 
          allowfullscreen="" 
          loading="lazy" 
          referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>

    <hr>

    <!-- Feedback and Volunteer Form -->
    <div class="row mt-5">
      <div class="col-md-6 mb-4 mb-md-0">
        <p>We value your feedback. Whether you have a question or a suggestion, we’re here for you 24/7. Feel free to call or email us anytime.</p>
        <h6 class="text-danger fw-bold">Contact information</h6>
        <p>000888-5556-7856<br>@sipafestival@gmail.com</p>
        <p class="fw-bold">Address</p>
        <p>Jl. Kedasih No.22,<br>Kerten, Laweyan, Solo, Central Java, INA</p>
      </div>

      <div class="col-md-6" id="submission">
        <div class="p-4 rounded border shadow-sm">
          <h6 class="text-danger fw-bold text-center mb-4">SUBMISSION VOLUNTEER FORM</h6>
          <form action="{{ route('data.store') }}" method="POST" id="submissionForm">
            @csrf
            <div class="mb-3">
              <input name="email" type="email" class="form-control border-danger" placeholder="Email">
            </div>
            <div class="mb-3">
              <input name="name" type="text" class="form-control border-danger" placeholder="Name">
            </div>
            <div class="mb-3">
              <input name="subject" type="text" class="form-control border-danger" placeholder="Subject">
            </div>
            <div class="mb-3">
              <textarea name="message" class="form-control border-danger" rows="4" placeholder="Message"></textarea>
            </div>
            <div class="text-center">
              <button type="submit" form="submissionForm" class="btn btn-danger btn-sm px-4 rounded-pill" id="submitBtn">SEND THE FORM</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Testimoni SIPA 2024 -->
  <div class="container py-5" style="background: linear-gradient(to bottom,rgba(253, 246, 227, 0.28),#ffe19d); border-radius: 20px;">
    <div class="text-center mb-4">
      <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">REVIEW AUDIENCE ON EVENT</h2>
      <h2 class="fw-bold text-dark mb-3">
        🌟 What Our Audience Says About SIPA 2024! 🌟
      </h2>
      <p class="text-secondary col-md-8 mx-auto">
        Explore heartfelt testimonials from attendees who experienced mesmerizing performances and vibrant cultural celebrations. <br>
        Relive the unforgettable moments that made SIPA 2024 truly remarkable!
      </p>
    </div>
    <div class="row justify-content-center g-3">
      <!-- Card 1 -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "SIPA 2024 luar biasa! Kreativitas dan budaya yang ditampilkan sangat menginspirasi."
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Maya</strong> <small class="text-muted">(Yogyakarta)</small><br>
              <small class="text-secondary">Pelajar/Mahasiswa</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "SIPA 2024 luar biasa! Kreativitas dan budaya yang ditampilkan sangat menginspirasi."
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Maya</strong> <small class="text-muted">(Yogyakarta)</small><br>
              <small class="text-secondary">Pelajar/Mahasiswa</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "SIPA 2024 luar biasa! Kreativitas dan budaya yang ditampilkan sangat menginspirasi."
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Maya</strong> <small class="text-muted">(Yogyakarta)</small><br>
              <small class="text-secondary">Pelajar/Mahasiswa</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "SIPA 2024 luar biasa! Kreativitas dan budaya yang ditampilkan sangat menginspirasi."
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Maya</strong> <small class="text-muted">(Yogyakarta)</small><br>
              <small class="text-secondary">Pelajar/Mahasiswa</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "SIPA 2024 luar biasa! Kreativitas dan budaya yang ditampilkan sangat menginspirasi."
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Maya</strong> <small class="text-muted">(Yogyakarta)</small><br>
              <small class="text-secondary">Pelajar/Mahasiswa</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="container my-5">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">FAQ SIPA (Solo International Performing Arts)</h2>
    <div class="accordion" id="faqSIPA">

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            When's the best time to arrive?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>We recommend arriving early to fully enjoy the festival experience and catch all the performances.</li>
              <li>Akan lebih baik apabila kalian datang lebih awal untuk menikmati pengalaman festival secara maksimal dan menyaksikan semua pertunjukan.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            Is there an admission fee for the festival?
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>No, admission to SIPA is completely free! You can enjoy all the performances and activities without any charge. (FREE EVENT)</li>
              <li>Tidak ada biaya masuk untuk festival ini! Kalian dapat menikmati semua pertunjukan dan kegiatan tanpa dikenakan biaya. (ACARA GRATIS)</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            Do I need to buy tickets to attend the festival?
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>No tickets are required to attend SIPA. Just come and enjoy the festival atmosphere and all the amazing performances!</li>
              <li>Tidak perlu membeli tiket untuk menghadiri SIPA. Cukup datang dan nikmati suasana festival serta semua pertunjukan yang luar biasa!</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            What are the different seating categories available at SIPA?
          </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>There are three seating categories available: VIP Seats, Invitation Seats, and General Seats. Each category offers a unique experience and view of the performances.</li>
              <li>Ada tiga kategori tempat duduk yang tersedia: VIP Seat, Undangan Seat, dan Umum Seat. Setiap kategori menawarkan pengalaman dan pemandangan yang berbeda terhadap pertunjukan.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
            How can I obtain VIP or Invitation Seats for the festival?
          </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>VIP Seats and Invitation Seats are limited and typically require prior registration or an invitation. Please check our official website for more details on how to secure these seats.</li>
              <li>VIP Seat dan Undangan Seat terbatas dan biasanya memerlukan pendaftaran sebelumnya atau undangan. Silakan cek situs resmi kami untuk informasi lebih lanjut tentang cara mendapatkan tempat duduk ini.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">SPONSOR</h2>
    <div class="col-md-6 mx-auto"> <!-- Tambahkan mx-auto -->
      <div class="sponsor-container p-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Besar" class="sponsor-logo logo-besar" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Besar" class="sponsor-logo logo-besar" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Sedang" class="sponsor-logo logo-sedang" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Sedang" class="sponsor-logo logo-sedang" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Kecil" class="sponsor-logo logo-kecil" />
          <!-- Tambahkan logo lainnya -->
        </div>
      </div>
    </div>
  </div>
  <div class="row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">MEDIA PARTNER</h2>
    <div class="col-md-6 mx-auto"> <!-- Tambahkan mx-auto -->
      <div class="medpart-container p-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <img src="logo1.png" alt="Logo 1" class="medpart-logo" />
          <img src="logo2.png" alt="Logo 2" class="medpart-logo" />
          <img src="logo3.png" alt="Logo 3" class="medpart-logo" />
          <img src="logo4.png" alt="Logo 4" class="medpart-logo" />
          <img src="logo5.png" alt="Logo 5" class="medpart-logo" />
          <!-- Tambahkan logo lainnya -->
        </div>
      </div>
    </div>
  </div>
  





  <!-- <div class="row mb-5 align-items-center">
    <div class="col-md-6">
      <h5 class="text-danger fw-bold">CULTURAL ESCAPE</h5>
      <p>Nikmati kekayaan budaya lokal melalui program jalan kaki tematik yang membawa pengunjung menjelajahi situs sejarah dan seni tradisional sekitar.</p>
    </div>
    <div class="col-md-6">
      <img src="https://via.placeholder.com/500x300" class="img-fluid rounded" alt="Cultural Escape">
    </div>
  </div> -->

  

</section>

<!-- Footer -->
<x-footer />
<script>
  const slides = document.querySelectorAll('.img-slide');
  let index = 0;

  setInterval(() => {
    slides[index].classList.add('d-none'); // Sembunyikan gambar sekarang
    index = (index + 1) % slides.length;
    slides[index].classList.remove('d-none'); // Tampilkan gambar berikutnya
  }, 3000);

  function openVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const iframe = document.getElementById('videoIframe');
  const youtubeLink = "https://www.youtube.com/embed/rJtSeMMQY9g?autoplay=1"; // Autoplay enabled

  thumbnail.style.display = 'none';
  iframe.src = youtubeLink;
  iframe.style.display = 'block';
}
  let currentPosition = 0;
  const container = document.getElementById('delegatesContainer');
  const containerWrapper = container.parentElement;
  const itemWidth = 250; // 220 + 2*15px margin

  function scrollLeft() {
    const maxScroll = 0;

    currentPosition += itemWidth;
    if (currentPosition > maxScroll) {
      currentPosition = maxScroll;
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }

  function scrollRight() {
    const containerWidth = container.scrollWidth;
    const wrapperWidth = containerWrapper.offsetWidth;
    const maxScroll = wrapperWidth - containerWidth;

    currentPosition -= itemWidth;
    if (currentPosition < maxScroll) {
      currentPosition = maxScroll;
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }

  // AUTO SCROLL tiap 3 detik
  setInterval(() => {
    const containerWidth = container.scrollWidth;
    const wrapperWidth = containerWrapper.offsetWidth;
    const maxScroll = wrapperWidth - containerWidth;

    currentPosition -= itemWidth;
    if (currentPosition < maxScroll) {
      currentPosition = 0; // kalau sudah mentok kanan, reset ke awal
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }, 1500);


  // AJAX untuk mengirim form
  $(document).ready(function () {
    $('#submissionForm').submit(function (e) {
      e.preventDefault(); // mencegah reload halaman

      const form = $(this);
      const url = form.attr('action');
      const formData = form.serialize();

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (response) {
          // Tampilkan notifikasi sukses
          Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Form berhasil dikirim!',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });

          form[0].reset(); // reset form jika perlu
        },
        error: function (xhr, status, error) {
          Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Gagal mengirim form!',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });

          console.log(xhr.responseText);
        }
      });
    });
  });

  (function() {
      // Target date: 4 Sep 2025, 19:00 WIB (UTC +7)
      var targetDate = new Date(Date.UTC(2025, 8, 4, 12, 0, 0)); // UTC time equivalent to 19:00 WIB
      var countdownEl = document.getElementById('countdown');
      function updateCountdown() {
        var now = new Date();
        var diff = targetDate - now;
        if (diff <= 0) {
          countdownEl.textContent = "The event has started!";
          clearInterval(timerInterval);
          return;
        }
        var totalSeconds = Math.floor(diff / 1000);
        var days = Math.floor(totalSeconds / (3600 * 24));
        var hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;
        countdownEl.textContent = 
          days + "d " + 
          ("0" + hours).slice(-2) + "h " + 
          ("0" + minutes).slice(-2) + "m " + 
          ("0" + seconds).slice(-2) + "s";
      }
      updateCountdown();
      var timerInterval = setInterval(updateCountdown, 1000);
    })();

</script>
</body>
</html>
