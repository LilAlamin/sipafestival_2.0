<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Sipafestival 2025 - Supporting Programs</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
  <style>
    /*================================================
    General Styles
    ================================================*/
    * {
      font-family: 'Poppins', sans-serif;
    }
    body {
      background-image: url('{{ asset('images/pattern/bgsipa2025.webp') }}');
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
    
    /*================================================
    Supporting Programs Section
    ================================================*/
    .programs-section {
      padding: 80px 20px;
    }

    .programs-section .section-title {
      font-size: 36px;
      font-weight: 700;
      color: #ffffff;
      margin-bottom: 4rem;
    }
    
    /*================================================
    Program Card Styles
    ================================================*/
    .program-card {
      position: relative;
      width: 100%;
      height: 250px; /* Atur tinggi kartu */
      background-size: cover;
      background-position: center;
      border-radius: 20px; /* Sudut melengkung yang lebih besar */
      overflow: hidden;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 10px 20px rgba(0,0,0,0.2);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .program-card:hover {
       transform: translateY(-10px);
       box-shadow: 0 15px 30px rgba(0,0,0,0.3);
    }
    
    .program-card-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.2); /* Overlay gelap transparan */
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      align-items: center;
      text-align: center;
      padding: 20px;
      transition: background-color 0.3s ease;
    }
    
    .program-card:hover .program-card-overlay {
        background-color: rgba(0, 0, 0, 0.3); /* Overlay lebih terang saat hover */
    }

    .program-title {
      color: #ffffff;
      font-size: 1.75rem;
      font-weight: 600;
      margin: 0;
    }

    .btn-details {
      margin-top: 15px;
      padding: 6px 20px;
      border: 2px solid #e0e0e0;
      border-radius: 50px;
      color: #ffffff;
      text-decoration: none;
      font-size: 0.8rem;
      font-weight: 600;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-details:hover {
      background-color: #ffffff;
      color: #314a3e;
    }

  </style>
</head>
<body>

<x-header title="Selamat Datang" />

<section class="programs-section">
  <div class="container text-center">
    <h2 class="fw-bold mb-2" style="font-size: 36px; color: #B8141E">@lang('messages.gallery_title')</h2>
    <h5 class="mb-4" style="color: #000;">@lang('messages.gallery_subtitle')</h5>
    
    <div class="row g-4 justify-content-center">
      @for ($year = 2025; $year >= 2009; $year--)
        <div class="col-lg-4 col-md-6">
            <div class="program-card" style="background-image: url('{{ asset('images/maskot/' . $year . '.webp') }}');">
            <div class="program-card-overlay" >
                <h3 class="program-title">{{ $year }}</h3>
                <a href="/gallery/{{ $year }}" class="btn-details">@lang('messages.gallery_btn')</a>
            </div>
            </div>
        </div>
        @endfor
    </div>
  </div>
</section>

<x-footer />

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>


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