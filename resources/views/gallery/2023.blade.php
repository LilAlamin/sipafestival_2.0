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
      background-image: url('{{ asset('images/pattern/BGSIPA.png') }}');
      background-repeat: repeat;
      background-size: auto;
      background-color: white;
    }
  </style>
</head>
<body>

<x-header title="Selamat Datang" />


<!-- SIPA Experience -->
<section class="py-5 welcome-section" id="welcome-section">
  <div class="container welcome-container" id="welcome-section">
      <h1 class="text-center fw-bold" style="color: #B8141E;">GALLERY SIPA</h1>
      <h2 class="text-center fw-medium mb-5" style="color: #B8141E;">Let’s make new journey on SIPA</h2>

      <div class="row mb-5 align-items-center">
        <div class="col-md-6">
          <h2 class="fw-bold mb-3" style="color: #B8141E;">SIPA 2023</h2>
            <p style="text-align: justify;">
                    Solo International Performing Arts (SIPA) 2025 merupakan ajang tahunan yang merayakan keindahan seni pertunjukan dari berbagai belahan dunia. Digelar di Kota Solo, SIPA 2025 menyuguhkan beragam pertunjukan menarik, mulai dari tarian tradisional hingga pertunjukan kontemporer yang inovatif. 
                    Dengan mengangkat tema <strong><em>"Performing Royal Genesis"</em></strong> dan menjadikan Gusti Sura sebagai maskot, SIPA 2025 berhasil menyoroti kekayaan budaya Jawa sekaligus menghadirkan nuansa modern.
            </p>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
          <div id="slider" class="position-relative overflow-hidden rounded" style="max-width: 100%;">
            <img src="{{ asset('images/sliderwelcome/w.slide 1.png') }}" class="img-slide img-fluid w-100 d-block" alt="Slide 1">
          </div>
        </div>
      </div>


    <div class="text-center mb-5">
      <h2 class="fw-bold" style="color: #B8141E;">AFTER MOVIE SIPA 2023</h2>
      <div class="position-relative d-inline-block mt-4" style="cursor: pointer; max-width: 2560px;">
        <div id="thumbnail" onclick="openVideo()" style="position: relative;">
          <img src="{{ asset('images/AM/T.AM2023.jpg') }}" class="img-fluid rounded-5" alt="On SIPA Last Year">
          <div class="play-button position-absolute top-50 start-50 translate-middle">
            <span class="circle"></span>
            <i class="bi bi-play-fill"></i>
          </div>
        </div>
        <iframe id="videoIframe" width="1280" height="720"
                src="https://www.youtube.com/embed/xMKSy58BxSU"
                title="YouTube video" frameborder="0"
                allow="autoplay; encrypted-media" allowfullscreen
                class="rounded-5" style="display: none;"></iframe>
      </div>
    </div>

    <div class="container my-5">
        <div class="arc-section mb-5 text-center">
            <h2 class="fw-bold" style="color: #B8141E;">FOTO FOTO</h2>
        </div>
        <div class="row justify-content-center text-center">
            <!-- Gambar 1 -->
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-3 mb-4">
                <div class="card border-0">
                    <img src="{{ asset('images/Teaser2024.png') }}" class="img-fluid rounded shadow-sm" alt="Foto 1">
                    <div class="mt-2">
                        <h6 class="mb-0 fw-bold">Direktur SIPA</h6>
                        <small class="text-muted">Dra. Irawati Kusumorasri, M.Sn.</small>
                    </div>
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
  const youtubeLink = "https://www.youtube.com/embed/xMKSy58BxSU?autoplay=1"; // Autoplay enabled

  thumbnail.style.display = 'none';
  iframe.src = youtubeLink;
  iframe.style.display = 'block';
}
</script>
</body>
</html>