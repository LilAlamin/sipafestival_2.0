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
        <div class="row mb-5">
      <!-- Berita 1 -->
      @foreach ($news as $new)
        <div class="col-md-3 mb-4">
          <div class="card h-100 shadow-sm border-0">
            <div class="position-relative">
              <img src="{{ asset('/images/news/' . $new->image_path) }}" class="card-img-top rounded-top" alt="{{ $new->title }}">
            </div>
            <div class="card-body">
              <small class="text-muted d-block mb-2">{{ $new->created_at->translatedFormat('l, d F Y H:i') }}</small>
              <h6 class="fw-bold">{{ $new->title }}</h6>
              <p class="text-muted mb-2" style="font-size: 0.875rem;">{{ Str::limit($new->description, 100, '...') }}</p>
              <a href="#" class="text-primary mt-3" style="font-weight: 500; text-decoration: none;">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
      @endforeach

    </div>
</div>
</section>
<x-footer />
</body>
</html>