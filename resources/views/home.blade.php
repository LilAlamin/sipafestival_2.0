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
    background-image: url('{{ asset('images/pattern/BGSIPA.png') }}');
    background-repeat: repeat;
    background-size: auto;
    background-color: white;
  } 
  /* SLIDER IMG */
    <style>
    .img-slide {
      position: absolute !important;
      top: 0;
      left: 0;
      transition: opacity 5s ease-in-out;
      width: 80%;
      height: 80%;
      object-fit: contain;
      transition: opacity 1s ease-in-out;
      opacity: 0;
      z-index: 0;
      border-radius: 20px 100px 20px 100px !important;
    }
    .img-slide.active {
      opacity: 1;
      z-index: 1;
    }
    #slider {
      width: 100%;
      max-width: 700px;
      height: 500px;
      position: relative;
      overflow: hidden;
      border-radius: 20px 100px 20px 100px !important;
    }
    .welcome-container {
      padding-top: 100px;
    }
  </style>
</head>
<body>

<x-header title="Selamat Datang" />

<!-- Header -->
<section class="text-justify py-5 header-section">
  <img src="{{ asset('images/pattern/headerr.png') }}" alt="Background" class="bg">
  <div class="container">
    <img src="{{ asset('images/pattern/logosipa2025.png') }}" alt="SIPA Logo" class="text" style="max-height: 450px;">
    <p class="fw-bold mb-2">4 · 5 · 6 SEPTEMBER 2025</p>
    <div id="countdown" class="d-flex justify-content gap-3 flex-wrap">
      <div class="countdown-item">
        <div class="countdown-number" id="days"></div>
        <div class="countdown-label">Days</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="hours"></div>
        <div class="countdown-label">Hours</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="minutes"></div>
        <div class="countdown-label">Minutes</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="seconds"></div>
        <div class="countdown-label">Seconds</div>
      </div>
    </div>
    <a href="#welcome-section" class="btn btn-findmore mt-4 fw-bold">FIND MORE</a>
  </div>
</section>

<script>
document.addEventListener("DOMContentLoaded", function () {
  var targetDate = new Date(Date.UTC(2025, 8, 4, 12, 0, 0)); // 4 Sep 2025, 19:00 WIB (UTC+7)

  function updateCountdown() {
    var now = new Date();
    var diff = targetDate - now;

    if (diff <= 0) {
      document.getElementById("countdown").innerHTML = "The event has started!";
      clearInterval(timerInterval);
      return;
    }

    var totalSeconds = Math.floor(diff / 1000);
    var days = Math.floor(totalSeconds / (3600 * 24));
    var hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
    var minutes = Math.floor((totalSeconds % 3600) / 60);
    var seconds = totalSeconds % 60;

    document.getElementById("days").textContent = days;
    document.getElementById("hours").textContent = ("0" + hours).slice(-2);
    document.getElementById("minutes").textContent = ("0" + minutes).slice(-2);
    document.getElementById("seconds").textContent = ("0" + seconds).slice(-2);
  }

  updateCountdown();
  var timerInterval = setInterval(updateCountdown, 1000);
});
</script>

<!-- SIPA Experience -->
<section class="py-5 welcome-section" id="welcome-section">
  <div class="container welcome-container" id="welcome-section">
      <h1 class="text-center fw-bold" style="color: #B8141E;">WELCOME TO SIPA!</h1>
      <h1 class="text-center fw-bold" style="color: #B8141E;">PERFORMING ROYAL GENESIS</h1>
      <h2 class="text-center fw-medium mb-5" style="color: #000;">Let’s make new journey on SIPA</h2>

      <!-- SLIDER FOTO -->
      <div class="row mb-5 align-items-center">
        <div class="col-md-6 text-container" style="padding-right: 50px;">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">We Are SIPA Festival</h2>
            <p style="text-align: justify;">
                    Solo International Performing Arts (SIPA) is an international masterpiece performance featuring dancers, musicians and theater performers from countries around the world. SIPA 2025 is organized in a hybrid manner, online and offline.
                    SIPA 2025 is held at the Outdoor Stage with a series of events, namely SIPA Show Case Stage (stages held at various crowd points in Solo such as shopping centers, Car Freeday, city parks or traditional markets in collaboration with the community through open call / curation. SIPA also collaborates with MSMEs (Culinary, Textil and Craft) to market their superior products.
            </p>
          <a href="/aboutus/history" class="btn btn-findmore2 mt-4 px-4 py-2 fw-bold">FIND OUT MORE</a>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <div id="slider" class="position-relative overflow-hidden rounded" style="width: 100%;">
            <img src="{{ asset('images/slider/1.png') }}" class="img-slide img-fluid w-100 d-block" alt="Slide 1">
            <img src="{{ asset('images/slider/2.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 2">
            <img src="{{ asset('images/slider/3.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 3">
            <img src="{{ asset('images/slider/4.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 4">
            <img src="{{ asset('images/slider/5.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 5">
            <img src="{{ asset('images/slider/6.png') }}" class="img-slide img-fluid w-100 d-none" alt="Slide 6">
          </div>
        </div>
      </div>

    <!-- YT -->
    <div class="container-yt-carousel">
      <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #B8141E;">SIPA LAST YEAR</h2>
        <div class="position-relative d-inline-block mt-4" style="cursor: pointer; max-width: 2560px;">
          <div id="thumbnail" onclick="openVideo()" style="position: relative;">
            <img src="{{ asset('images/AM/T.T2024.jpg') }}" class="img-fluid rounded-5" alt="On SIPA Last Year">
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

      <!-- MASKOT -->
      <div class="arc-section mb-5 text-center">
        <h2 class="fw-bold" style="color: #B8141E;">MASKOT SIPAFESTIVAL</h2>
        <div class="carousel slide mx-auto carousel-margin" data-bs-ride="carousel" data-bs-interval="3000" style="max-width: 600px;">
          <div class="carousel-inner custom-rounded">
            <div class="carousel-item active">
              <img src="{{ asset('images/pattern/coomingsoon.webp') }}" class="d-block w-100" alt="Gambar 1">
            </div>
          </div>
          <p class="mt-3" style="font-size: 18px;">
            <span class="fw-bold">2025</span><br>
            <span class="fw-normal">SIPA festival</span>
          </p>
        </div>
      </div>
      <div class="delegates-section text-center">
        <div class="delegate-container position-relative" style="overflow: hidden;">
          <div id="delegatesContainer" class="delegates-wrapper">
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2009.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2009</span><br>
                <span class="fw-normal">Rahma Putri Parimita</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2010.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2010</span><br>
                <span class="fw-normal">Sruti Respati</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2011.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2011</span><br>
                <span class="fw-normal">GPH. Paundrakarna</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2012.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2012</span><br>
                <span class="fw-normal">GKR. Timoer Rumbai K</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2013.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2013</span><br>
                <span class="fw-normal">Rachel Georghea S</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2014.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2014</span><br>
                <span class="fw-normal">Tunku Atiah</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2015.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2015</span><br>
                <span class="fw-normal">Fajar Satriadi</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2016.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2016</span><br>
                <span class="fw-normal">Peni Candra Rini</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2017.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2017</span><br>
                <span class="fw-normal">Dr. Eko Supriyanto, S.Sn., MFA</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2018.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2018</span><br>
                <span class="fw-normal">Melati Suryodarmo</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2019.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2019</span><br>
                <span class="fw-normal">Elizabeth Sudira</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2020.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2020</span><br>
                <span class="fw-normal">Dory Harsa</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2021.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2021</span><br>
                <span class="fw-normal">Endah Laras</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2022.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2022</span><br>
                <span class="fw-normal">Rianto</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2023.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2023</span><br>
                <span class="fw-normal">Wirastuti Sulistyaningsih</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/maskot/2024.webp') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">2024</span><br>
                <span class="fw-normal">GRAj Ancillasura Marina Sudjiwo</span>
              </p>
            </div>
            <div class="delegate-item text-center flex-shrink-0 mx-3">
              <img src="{{ asset('images/delegates/delegates 1.png') }}" alt="Delegate" class="img-fluid rounded-4" style="width: 220px; height: 220px; object-fit: cover;">
              <p class="mt-2" style="font-size: 16px;">
                <span class="fw-bold">Jangan dihapus</span><br>
                <span class="fw-normal">ini untuk tutupnya</span>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Berita -->
    <div class="arc-section mb-5 text-center">
      <h2 class="fw-bold" style="color: #B8141E;">NEWS SIPA</h2>
      <h4 class="text-center fw-medium mb-5" style="color: #000;">Update news about SIPA</h4>
    </div>
    <div class="row mb-5 news-wrapper">
      <!-- Berita 1 -->
      @foreach ($news->take(3) as $new)
        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="position-relative">
              <img src="{{ asset('/images/news/' . $new->image_path) }}" class="card-img-top rounded-top" alt="{{ $new->title }}">
            </div>
            <div class="card-body">
              <small class="text-muted d-block mb-2">{{ $new->created_at->translatedFormat('l, d F Y H:i') }}</small>
              <h6 class="fw-bold">{{ $new->title }}</h6>
              <p class="text-muted mb-2" style="font-size: 0.875rem;">{{ Str::limit($new->description, 100, '...') }}</p>
              <a href="{{ url('/detailNews/' . $new->slug) }}" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      @endforeach
      <a href="/news" class="btn btn-findmore2 mt-4 fw-bold">OTHER NEWS</a>
    </div>


    <!-- Section Title -->
    <div class="text-center mb-4 title-loc">
      <h5 class="fw-bold" style="color: #B8141E;">We’re Closer Than You Think!</h5>
      <h5 class="fw-bold">@SIPAFESTIVAL</h5>
    </div>

    <!-- Location and Map -->
    <div class="row mb-5 align-items-center">
      <div class="col-md-6">
        <h6 class="text-danger fw-bold">LOCATION</h6>
        <p class="fw-bold">Address</p>
        <p>22 Kedasih Street, <br> Kerten Sub-district, Laweyan District, Surakarta City, <br>Central Java 57143, Indonesia</p>
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

    <!-- Feedback and Form -->
    <div class="row mt-5">
      <div class="col-md-6 mb-4 mb-md-0">
        <p>We greatly appreciate your insights. For any further information or suggestions, please contact us anytime—our dedicated team is available 24 hours a day, 7 days a week.</p>
        <h6 class="text-danger fw-bold">Contact information</h6>
        <p>+62 856-4722-5058<br>sipafestival@gmail.com</p>
      </div>

      <div class="col-md-6" id="submission">
        <div class="p-4 rounded border shadow-sm">
          <h6 class="fw-bold text-center mb-4" style="color: #B8141E;">Feedback & Suggestions</h6>
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
            <div class="text-center ">
              <button type="submit" form="submissionForm" class=" btn-sm btn-findmore2" id="submitBtn">Submit Feedback</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Testimoni SIPA 2024 -->
  <div class="container py-5 testi">
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

    <!-- FAQ -->
  <div class="container my-5">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">FAQ SIPA</h2>
    <div class="accordion" id="faqSIPA">

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            How much is the entrance fee to watch SIPA?
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>No, admission to SIPA is completely free! You can enjoy all the performances and activities without any charge. (FREE EVENT)</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            What I will find at the SIPA Festival
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>Expect a vibrant mix of performances, including music, dance, and theater, along with food stalls and cultural exhibitions!</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            What are the different seating categories available at SIPA?
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>There are three seating categories available: VIP Seats, Invitation Seats, and General Seats. Each category offers a unique experience and view of the performances</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            Will you be posting the schedule in advance?
          </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>Absolutely! Check our official website and social media instagram @sipafestival for the latest updates on the festival schedule.</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
            What types of cameras are allowed?
          </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>VProfessional cameras with detachable lenses, such as DSLRs, are not permitted. However, you can bring compact cameras and smartphones.</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SPONSOR MEDPART -->
  <div class="sponsor-media row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">SPONSOR</h2>
    <div class="col-md-6 mx-auto"> <!-- Tambahkan mx-auto -->
      <div class="sponsor-container p-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <img src="{{ asset('images/sponsor/KEMENKEBUD LOGO 01 (COLOR).png') }}" alt="Logo Besar" class="sponsor-logo logo-besar" />
          <img src="{{ asset('images/sponsor/Logo DANAINDO (BLUE).png') }}" alt="Logo Besar" class="sponsor-logo logo-besar" />
          <img src="{{ asset('images/sponsor/LPDP (COLORBLACK).png') }}" alt="Logo Besar" class="sponsor-logo logo-besar" />
          <!-- <img src="{{ asset('images/211.jpg') }}" alt="Logo Sedang" class="sponsor-logo logo-sedang" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Sedang" class="sponsor-logo logo-sedang" />
          <img src="{{ asset('images/211.jpg') }}" alt="Logo Kecil" class="sponsor-logo logo-kecil" /> -->
          <!-- Tambahkan logo lainnya -->
        </div>
      </div>
    </div>
  </div>
  <div class="sponsor-media row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">MEDIA PARTNER</h2>
    <div class="col-md-6 mx-auto"> <!-- Tambahkan mx-auto -->
      <div class="medpart-container p-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <p>COMING SOON</p>
          <!-- <img src="{{ asset('images/sponsor/KEMENKEBUD LOGO 01 (COLOR).png') }}" alt="Logo 1" class="sponsor-logo logo-sedang" />
          <img src="logo2.png" alt="Logo 2" class="medpart-logo" />
          <img src="logo3.png" alt="Logo 3" class="medpart-logo" />
          <img src="logo4.png" alt="Logo 4" class="medpart-logo" />
          <img src="logo5.png" alt="Logo 5" class="medpart-logo" /> -->
        </div>
      </div>
    </div>
  </div>
  





  {{-- <div class="row mb-5 align-items-center">
    <div class="col-md-6">
      <h5 class="text-danger fw-bold">CULTURAL ESCAPE</h5>
      <p>Nikmati kekayaan budaya lokal melalui program jalan kaki tematik yang membawa pengunjung menjelajahi situs sejarah dan seni tradisional sekitar.</p>
    </div>
    <div class="col-md-6">
      <img src="https://via.placeholder.com/500x300" class="img-fluid rounded" alt="Cultural Escape">
    </div>
  </div> --}}

  

</section>

<x-footer />

<script>
  function openVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const iframe = document.getElementById('videoIframe');
  const youtubeLink = "https://www.youtube.com/embed/rJtSeMMQY9g?autoplay=1"; // Autoplay enabled

  thumbnail.style.display = 'none';
  iframe.src = youtubeLink;
  iframe.style.display = 'block';
}
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
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.delegates-wrapper');
    const items = document.querySelectorAll('.delegate-item');
    const itemWidth = items[0].offsetWidth + 30; // 220px width + 2*15px margin
    let currentIndex = 0;
    const totalItems = items.length;

    setInterval(() => {
      currentIndex++;
      if (currentIndex > totalItems - Math.floor(container.parentElement.offsetWidth / itemWidth)) {
        currentIndex = 0;
      }

      container.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
    }, 3000); // 3000ms = 3 detik
  });
</script>


</body>
</html>
