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
    background-image: url('{{ asset('images/pattern/bgsipa2025.webp') }}');
    background-repeat: repeat;
    background-size: auto;
    background-color: white;
    font-family: 'Poppins', sans-serif; /* Pastikan font konsisten */
  }

  /* === CSS UNTUK HALAMAN BERITA === */
  
  .news-detail-section {
    color: #333; /* Warna teks default agar mudah dibaca */
  }
  
  .news-meta {
    font-size: 0.9rem;
    color: #6c757d; /* Warna abu-abu untuk metadata */
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }
  
  .news-title {
    color: #B8141E; /* Warna merah khas Anda untuk judul */
    font-size: 2.8rem; /* Ukuran font judul lebih besar */
    line-height: 1.2;
  }
  
  .news-image {
    border-radius: 15px; /* Sudut gambar lebih melengkung */
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    width: 80%;
    height: auto;
  }
  
  .news-content p {
    font-size: 1.1rem; /* Ukuran font konten agar nyaman dibaca */
    line-height: 1.9; /* Jarak antar baris lebih lega */
    text-align: justify; /* Teks rata kiri-kanan */
    margin-bottom: 1.5rem; /* Jarak antar paragraf */
  }

  /* Penyesuaian untuk layar kecil (mobile) */
  @media (max-width: 768px) {
    .news-title {
      font-size: 2rem; /* Judul lebih kecil di mobile */
    }
    .news-content p {
      font-size: 1rem;
      text-align: left; /* Rata kiri lebih baik di mobile */
    }
  }
</style>
</head>
<body>
<x-header title="Selamat Datang" />

<section class="news-detail-section py-5">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 text-center">
        
        <header class="news-header">
          <div class="news-meta mb-3">
            </div>
          
          <h1 class="news-title fw-bolder">{{ $news->title }}</h1>
        </header>

        <img src="{{ asset('/images/news/' . $news->image_path) }}" class="news-image img-fluid d-block mx-auto mb-5" alt="{{ $news->title }}">
        <span><i class="fas fa-calendar-alt me-2"></i>{{ $news->created_at->translatedFormat('d F Y') }}</span>

        <article class="news-content">
          <p>{!! nl2br(e($news->description)) !!}</p>
        </article>
        
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