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
    <h1 class="fw-bold display-5 mb-4">History Solo International Performing Arts (SIPA)</h1>

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
        Solo International Performing Arts (SIPA) is an annual performing arts festival held in the city of Solo since 2009. The initiator of SIPA was Ir. Joko Widodo, who at the time served as the Mayor of Surakarta.
      </p>
      <p style="text-align: justify;">
        The SIPA performances were initially held at the Pamedan Pura Mangkunegaran (2009–2012), then moved to Vastenburg Fortress (2013–2019), the Central Java Cultural Park in Surakarta (2020), Bengawan Solo Park (2021), returned to Vastenburg Fortress (2022–2023), and most recently back to the Pamedan Pura Mangkunegaran in 2024.
      </p>
      <p style="text-align: justify;">
        SIPA’s stage features a variety of performing arts from different countries, including music, dance, drama (theater), and more. The event takes place over three consecutive nights. Each SIPA performance aims to educate and foster public appreciation for the power of the performing arts.
      </p>
      <p style="text-align: justify;">
        The festival also promotes cultural convergence, which in turn is expected to help create a more harmonious global society through the spirit of the performing arts. The core concept of SIPA is to be a part of cultural life that is intentionally presented to educate and enhance public appreciation for the potential and strength of the performing arts.
      </p>
    </div>
  </div>
</section>


<x-footer />
</body>
</html>