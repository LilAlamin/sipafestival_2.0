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
    #slider {
      width: 100%;
      max-width: 700px;
      height: 500px;
      position: relative;
      overflow: hidden;
      border-radius: 20px 100px 20px 100px !important;
    }
  </style>
</head>
<body>

<x-header title="Selamat Datang" />


<!-- SIPA Experience -->
<section class="py-5 welcome-section" id="welcome-section">
  <div class="container welcome-container" id="welcome-section">
      <h1 class="text-center fw-bold" style="color: #B8141E;">GALLERY SIPA</h1>
      <h2 class="text-center fw-medium mb-5" style="color:rgb(0, 0, 0);">Let’s make new journey on SIPA</h2>

      <div class="row mb-5 align-items-center">
        <div class="col-md-6" style= "padding-right: 50px;">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">SIPA 2011</h2>
            <p style="text-align: justify;">
                    Solo International Performing Arts (SIPA) 2011 merupakan ajang tahunan yang merayakan keindahan seni pertunjukan dari berbagai belahan dunia. Diselenggarakan di Pamedan Pura Mangkunegaran, Solo, SIPA 2011 mengusung tema 
                     <strong><em>"Art is an Expression of Honesty Leads Life Toward Glory".</em></strong> Acara yang berlangsung pada tanggal 1, 2, dan 3 Juli 2011 ini menampilkan pertunjukan yang sarat makna dan kejujuran artistik, 
                     mengajak masyarakat untuk melihat seni sebagai cermin kejujuran yang menuntun pada kemuliaan hidup. Dengan menjadikan GPH. Paundrakarna sebagai maskot, SIPA 2011 menghadirkan ruang pertemuan budaya yang menyuarakan nilai-nilai luhur, serta membangun komunikasi lintas individu, komunitas, bahkan negara. Dalam semangat integritas, penghargaan terhadap perbedaan, dan kemuliaan melalui ekspresi seni, SIPA kembali memperkuat perannya sebagai wadah yang menyatukan dunia melalui panggung budaya.
            </p>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div id="slider" class="position-relative overflow-hidden rounded" style="max-width: 100%;">
            <img src="{{ asset('images/maskot/2011.webp') }}" class="img-slide img-fluid w-100 d-block" alt="Slide 1">
          </div>
        </div>
      </div>


    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color: #B8141E;">AFTER MOVIE SIPA 2011</h2>
      <div class="position-relative d-inline-block mt-4" style="cursor: pointer; max-width: 2560px;">
        <div id="thumbnail" onclick="openVideo()" style="position: relative;">
          <img src="{{ asset('images/gallery/2011/2011.jpg') }}" class="img-fluid rounded-5" alt="On SIPA Last Year">
          <div class="play-button position-absolute top-50 start-50 translate-middle">
            <span class="circle"></span>
            <i class="bi bi-play-fill"></i>
          </div>
        </div>
        <iframe id="videoIframe" width="1280" height="720"
                src="https://www.youtube.com/embed/OHRE8La8qZY"
                title="YouTube video" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen
                class="rounded-5" style="display: none;"></iframe>
      </div>
    </div>

    <div class="container my-5">
        <div class="arc-section mb-5 text-center">
            <h2 class="fw-bold" style="color: #B8141E;">DOKUMENTASI</h2>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Gambar 1 -->
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/a.webp') }}" class="img-fluid custom-rounded" alt="Foto 1">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/b.webp') }}" class="img-fluid custom-rounded" alt="Foto 2">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/c.webp') }}" class="img-fluid custom-rounded" alt="Foto 3">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/d.webp') }}" class="img-fluid custom-rounded" alt="Foto 4">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/e.webp') }}" class="img-fluid custom-rounded" alt="Foto 5">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/f.webp') }}" class="img-fluid custom-rounded" alt="Foto 6">
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/gallery/2011/g.webp') }}" class="img-fluid custom-rounded" alt="Foto 7">
                </div>
            </div>
        </div>
    </div>




</section>
<x-footer />

<script>
  function openVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const iframe = document.getElementById('videoIframe');
  const youtubeLink = "https://www.youtube.com/embed/OHRE8La8qZY?autoplay=1"; // Autoplay enabled

  thumbnail.style.display = 'none';
  iframe.src = youtubeLink;
  iframe.style.display = 'block';
}

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