<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SIPA Festival </title>
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
  <img src="{{ asset('images/pattern/headerr.webp') }}" alt="Background" class="bg">
  <div class="container">
    <img src="{{ asset('images/pattern/logosipa2025.png') }}" alt="SIPA Logo" class="text" style="max-height: 450px;">
    <p class="fw-bold mb-2">4 · 5 · 6 SEPTEMBER 2025</p>
    <div id="countdown" class="d-flex justify-content gap-3 flex-wrap">
      <div class="countdown-item">
        <div class="countdown-number" id="days"></div>
        <div class="countdown-label">@lang('messages.days')</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="hours"></div>
        <div class="countdown-label">@lang('messages.hours')</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="minutes"></div>
        <div class="countdown-label">@lang('messages.minutes')</div>
      </div>
      <div class="countdown-item">
        <div class="countdown-number" id="seconds"></div>
        <div class="countdown-label">@lang('messages.seconds')</div>
      </div>
    </div>
    <a href="#welcome-section" class="btn btn-findmore mt-4 fw-bold">@lang('messages.find_more')</a>
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
      <h1 class="text-center fw-bold" style="color: #B8141E;">@lang('messages.welcome_sipa')</h1>
      <h1 class="text-center fw-bold" style="color: #B8141E;">PERFORMING ROYAL GENESIS</h1>
      <h2 class="text-center fw-medium mb-5" style="color: #000;">@lang('messages.lets_journey')</h2>

      <!-- SLIDER FOTO -->
      <div class="row mb-5 align-items-center">
        <div class="col-md-6 text-container" style="padding-right: 50px;">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">We Are SIPA Festival</h2>
            <p style="text-align: justify;">@lang('messages.journey_description')</p>
          <a href="/aboutus/history" class="btn btn-findmore2 mt-4 px-4 py-2 fw-bold">@lang('messages.find_out')</a>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
          <div id="slider" class="position-relative overflow-hidden rounded w-100">
              @foreach (range(1, 6) as $i)
                  <img src="{{ asset("images/slider/{$i}.webp") }}" 
                      class="img-slide img-fluid w-100 {{ $i === 1 ? 'd-block' : 'd-none' }}" 
                      alt="Slide {{ $i }}">
              @endforeach
          </div>
        </div>
      </div>

    <!-- YT -->
    <div class="container-yt-carousel">
      <div class="text-center mb-5">
        <h2 class="fw-bold" style="color: #B8141E;">SIPA FESTIVAL @lang('messages.last_year')</h2>
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
      @php
            $delegates = [
                2009 => 'Rahma Putri Parimita',
                2010 => 'Sruti Respati',
                2011 => 'GPH. Paundrakarna',
                2012 => 'GKR. Timoer Rumbai K',
                2013 => 'Rachel Georghea S',
                2014 => 'Tunku Atiah',
                2015 => 'Fajar Satriadi',
                2016 => 'Peni Candra Rini',
                2017 => 'Dr. Eko Supriyanto, S.Sn., MFA',
                2018 => 'Melati Suryodarmo',
                2019 => 'Elizabeth Sudira',
                2020 => 'Dory Harsa',
                2021 => 'Endah Laras',
                2022 => 'Rianto',
                2023 => 'Wirastuti Sulistyaningsih',
                2024 => 'GRAj Ancillasura Marina Sudjiwo',
            ];
      @endphp
      <div class="arc-section mb-5 text-center">
        <h2 class="fw-bold" style="color: #B8141E;">MASKOT SIPA FESTIVAL</h2>
        <div class="carousel slide mx-auto carousel-margin" data-bs-ride="carousel" data-bs-interval="3000" style="max-width: 600px;">
          <div class="carousel-inner custom-rounded">
            <div class="carousel-item active">
              <img src="{{ asset('images/pattern/coomingsoon.webp') }}" class="d-block w-100" alt="Gambar 1">
            </div>
          </div>
          <p class="mt-3" style="font-size: 18px;">
            <span class="fw-bold">2025</span><br>
            <span class="fw-normal">SIPA Festival</span>
          </p>
        </div>
      </div>
      <div class="delegates-section text-center">
        <div class="delegate-container">
          <div class="delegates-wrapper">
            @foreach ($delegates as $year => $name)
                <div class="delegate-item text-center mx-3">
                    <img src="{{ asset("images/maskot/{$year}.webp") }}"
                         alt="Delegate"
                         class="img-fluid rounded-4"
                         style="width: 220px; height: 220px; object-fit: cover;">
                    <p class="mt-2" style="font-size: 16px;">
                        <span class="fw-bold">{{ $year }}</span><br>
                        <span class="fw-normal">{{ $name }}</span>
                    </p>
                </div>
            @endforeach
          </div>
        </div>
      </div>
      <div class="slider-indicator"></div>
    </div>
    <!-- Berita -->
    <div class="arc-section mb-5 text-center">
      <h2 class="fw-bold" style="color: #B8141E;">@lang('messages.news') SIPA FESTIVAL</h2>
      <h4 class="text-center fw-medium mb-5" style="color: #000;">@lang('messages.update_news')</h4>
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
              <a href="{{ route('news.HomeView', ['slug' => $new->slug]) }}" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      @endforeach
      <a href="/news" class="btn btn-findmore2 mt-4 fw-bold">@lang('messages.other_news')</a>
    </div>


    <!-- Section Title -->
    <div class="text-center mb-4 title-loc">
      <h5 class="fw-bold" style="color: #B8141E;">@lang('messages.we_are_closer')</h5>
      <h5 class="fw-bold">@SIPAFESTIVAL</h5>
    </div>

    <!-- Location and Map -->
    <div class="row mb-5 align-items-center">
      <div class="col-md-6">
        <h6 class="text-danger fw-bold">@lang('messages.location')</h6>
        <p class="fw-bold">@lang('messages.address')</p>
        <p>@lang('messages.kedasih'), <br> @lang('messages.subdistrict'), <br>@lang('messages.city')</p>
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
        <p>@lang('messages.greeting_form')</p>
        <h6 class="text-danger fw-bold">@lang('messages.contact')</h6>
        <p>+62 882-2505-2982<br>sipafestival@gmail.com</p>
      </div>

      <div class="col-md-6" id="submission">
        <div class="p-4 rounded border shadow-sm">
          <h6 class="fw-bold text-center mb-4" style="color: #B8141E;">@lang('messages.feedback')</h6>
          <form action="{{ route('data.store') }}" method="POST" id="submissionForm">
            @csrf
            <div class="mb-3">
              <input name="email" type="email" class="form-control border-danger" placeholder="Email">
            </div>
            <div class="mb-3">
              <input name="name" type="text" class="form-control border-danger" placeholder="@lang('messages.name')">
            </div>
            <div class="mb-3">
              <input name="subject" type="text" class="form-control border-danger" placeholder="@lang('messages.subject')">
            </div>
            <div class="mb-3">
              <textarea name="message" class="form-control border-danger" rows="4" placeholder="@lang('messages.message')"></textarea>
            </div>
            <div class="text-center ">
              <button type="submit" form="submissionForm" class=" btn-sm btn-findmore2" id="submitBtn">@lang('messages.submit_feedback')</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!-- Testimoni SIPA 2024 -->
  <div class="container py-5 testi">
    <div class="text-center mb-4">
      <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">@lang('messages.review_title')</h2>
      <h2 class="fw-bold text-dark mb-3">
        🌟 @lang('messages.what_our_audience_say') 🌟
      </h2>
      <p class="text-secondary col-md-8 mx-auto">
        @lang('messages.review_description_1')<br>
        @lang('messages.review_description_2')
      </p>
    </div>
    <div class="row justify-content-center g-3">
      <!-- Card 1 -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "@lang('messages.review_angela')"
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Angela Tanoesoedibjo</strong> <small class="text-muted">(Indonesia)</small><br>
              <small class="text-secondary">Wamenparekraf</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "@lang('messages.review_puan')"
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Puan Maharani</strong> <small class="text-muted">(Indonesia)</small><br>
              <small class="text-secondary">Ketua DPR RI</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "@lang('messages.review_gusti')"
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Gusti Bhre</strong> <small class="text-muted">(Indonesia)</small><br>
              <small class="text-secondary">KGPAA Mangkunegara X</small>
            </div>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
        <div class="p-3 rounded-4 h-100 shadow-sm" style="background: #fff; border: 2.5px solid #B8141E; font-size: 0.85rem;">
          <p class="text mb-3 text-center" style="color:rgb(0, 0, 0); font-size: 16px;">
            "@lang('messages.review_kim')"
          </p>
          <div class="d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/211.jpg') }}" class="rounded-circle me-2" style="width: 28px; height: 28px; object-fit: cover;">
            <div class="text-start" style="line-height: 1;">
              <strong style="font-size: 0.85rem;">Kim Yong Woon</strong> <small class="text-muted">(Korea)</small><br>
              <small class="text-secondary">Direktur KCCI</small>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- FAQ -->
  <div class="container my-5">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">FAQ SIPA FESTIVAL</h2>
    <div class="accordion" id="faqSIPA">

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq1">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
            @lang('messages.faq_question_1')  
          </button>
        </h2>
        <div id="collapse1" class="accordion-collapse collapse" aria-labelledby="faq1" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>@lang('messages.faq_answer_1')</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq2">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
            @lang('messages.faq_question_2')
          </button>
        </h2>
        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="faq2" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>@lang('messages.faq_answer_2')</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq3">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
            @lang('messages.faq_question_3')
          </button>
        </h2>
        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="faq3" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>@lang('messages.faq_answer_3')</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq4">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
            @lang('messages.faq_question_4')
          </button>
        </h2>
        <div id="collapse4" class="accordion-collapse collapse" aria-labelledby="faq4" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>@lang('messages.faq_answer_4')</li>
            </ul>
          </div>
        </div>
      </div>

      <div class="accordion-item">
        <h2 class="accordion-header" id="faq5">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
            @lang('messages.faq_question_5')
          </button>
        </h2>
        <div id="collapse5" class="accordion-collapse collapse" aria-labelledby="faq5" data-bs-parent="#faqSIPA">
          <div class="accordion-body">
            <ul>
              <li>@lang('messages.faq_answer_5')</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- SPONSOR MEDPART -->
  <div class="sponsor-media row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">SPONSOR</h2>
    <div class="col-10 col-lg-8 mx-auto"> <!-- Perbesar dari col-md-6 -->
      <div class="sponsor-container p-4 text-center sponsor-flex">
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            <img src="{{ asset('images/sponsor/KEMENKEBUD LOGO 01 (COLOR).png') }}" alt="Logo Besar" class="sponsor-logo" />
            <img src="{{ asset('images/sponsor/Logo DANAINDO (BLUE).png') }}" alt="Logo Besar" class="sponsor-logo" />
            <img src="{{ asset('images/sponsor/LPDP (COLORBLACK).png') }}" alt="Logo Besar" class="sponsor-logo" />
        </div>
      </div>
    </div>
  </div>

  <div class="sponsor-media row mb-5 align-items-center justify-content-center">
    <h2 class="mb-4 text-center fw-bold" style="color: #B8141E;">MEDIA PARTNER</h2>
    <div class="col-10 col-lg-8 mx-auto"> <!-- Perbesar dari col-md-6 -->
      <div class="medpart-container p-4 text-center">
        <div class="d-flex flex-wrap justify-content-center gap-3">
          <p class="mb-0">COMING SOON</p>
          <!-- 
          <img src="{{ asset('images/sponsor/KEMENKEBUD LOGO 01 (COLOR).png') }}" alt="Logo 1" class="medpart-logo" />
          <img src="logo2.png" alt="Logo 2" class="medpart-logo" />
          <img src="logo3.png" alt="Logo 3" class="medpart-logo" />
          <img src="logo4.png" alt="Logo 4" class="medpart-logo" />
          <img src="logo5.png" alt="Logo 5" class="medpart-logo" /> 
          -->
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
    const indicatorContainer = document.querySelector('.slider-indicator');
    const itemWidth = items[0].offsetWidth + 30; // width + margin
    const itemsPerSlide = 4;
    const totalSlides = Math.ceil(items.length / itemsPerSlide);
    let currentIndex = 0;
    let interval;

    // Generate indicators sesuai jumlah grup slide
    for (let i = 0; i < totalSlides; i++) {
        const dot = document.createElement('span');
        if (i === 0) dot.classList.add('active');
        dot.dataset.index = i;
        indicatorContainer.appendChild(dot);
    }

    const indicators = document.querySelectorAll('.slider-indicator span');

    function goToSlide(index) {
        currentIndex = index;
        const translateX = currentIndex * itemWidth * itemsPerSlide;
        container.style.transform = `translateX(-${translateX}px)`;
        indicators.forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }

    function startAutoSlide() {
        clearInterval(interval);
        interval = setInterval(() => {
            currentIndex = (currentIndex + 1) % totalSlides;
            goToSlide(currentIndex);
        }, 3000);
    }

    // Set klik event ke indikator
    indicators.forEach(dot => {
        dot.addEventListener('click', () => {
            goToSlide(parseInt(dot.dataset.index));
            startAutoSlide(); // reset timer
        });
    });

    startAutoSlide();
});




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
