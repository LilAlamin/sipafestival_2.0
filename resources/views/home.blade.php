<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Under Construction - SIPA Festival 2026</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <!-- Google Font Poppins for body text -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <!-- Lottie Web Player CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.12.2/lottie.min.js"></script>

  <style>
    @font-face {
      font-family: 'Font_SIPA26';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Bold.ttf') }}") format('truetype');
      font-weight: bold;
      font-style: normal;
    }

    @font-face {
      font-family: 'Font_SIPA26-Regular';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Regular.ttf') }}") format('truetype');
      font-weight: normal;
      font-style: normal;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Poppins', sans-serif;
      min-height: 100vh;
      background-color: #0d0d11;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      position: relative;
      overflow-x: hidden;
    }

    /* Fixed Background Image Layer */
    .bg-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-image: url("{{ asset('images/background26.png') }}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      z-index: -2;
    }

    /* Light Vignette Overlay to preserve bright original background */
    .bg-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: radial-gradient(circle at center, rgba(0, 0, 0, 0.05) 0%, rgba(0, 0, 0, 0.35) 100%);
      z-index: -1;
      pointer-events: none;
    }

    .main-container {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 900px;
      padding: 40px 20px;
      text-align: center;
      margin: auto;
    }

    .logo-img {
      max-width: 220px;
      width: 100%;
      height: auto;
      margin-bottom: 25px;
      filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.7));
      animation: fadeInDown 1.2s ease-out forwards;
    }

    .construction-title {
      font-family: 'Font_SIPA26', serif;
      font-size: clamp(2.5rem, 6vw, 4.8rem);
      font-weight: 700;
      letter-spacing: 4px;
      text-transform: uppercase;
      color: #ffffff;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.9), 0 0 10px rgba(0, 0, 0, 0.7);
      margin-bottom: 10px;
      line-height: 1.2;
      animation: fadeInUp 1.2s ease-out forwards;
    }

    .subtitle {
      font-size: clamp(1rem, 2.5vw, 1.25rem);
      font-weight: 600;
      letter-spacing: 2px;
      color: #ffffff;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.9);
      margin-bottom: 35px;
      animation: fadeInUp 1.4s ease-out forwards;
    }

    /* IG Embed Card */
    .ig-embed-card {
      background: rgba(255, 255, 255, 0.08);
      backdrop-filter: blur(14px);
      -webkit-backdrop-filter: blur(14px);
      border: 1px solid rgba(255, 255, 255, 0.18);
      border-radius: 24px;
      padding: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.4);
      display: inline-block;
      width: 100%;
      max-width: 440px;
      margin: 0 auto 30px auto;
      animation: fadeInUp 1.6s ease-out forwards;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .ig-embed-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
    }

    .ig-embed-card iframe {
      width: 100%;
      height: 480px;
      border: none;
      border-radius: 16px;
      background: #ffffff;
    }

    .social-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #e1306c, #c13584, #833ab4);
      color: #ffffff;
      padding: 12px 28px;
      border-radius: 50px;
      font-weight: 600;
      text-decoration: none;
      font-size: 1rem;
      box-shadow: 0 8px 20px rgba(225, 48, 108, 0.4);
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .social-btn:hover {
      color: #ffffff;
      transform: scale(1.05);
      box-shadow: 0 12px 25px rgba(225, 48, 108, 0.6);
    }

    footer {
      position: relative;
      z-index: 2;
      padding: 20px;
      font-size: 0.875rem;
      color: rgba(255, 255, 255, 0.6);
      text-align: center;
    }

    /* Keyframes */
    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

  <!-- Background Layers -->
  <div class="bg-layer"></div>
  <div class="bg-overlay"></div>

  <div class="main-container">
    <!-- Logo -->
    <img src="{{ asset('images/logo_putih.png') }}" alt="Logo SIPA Festival" class="logo-img">

    <!-- Lottie Gears Animation -->
    <div id="gears-animation" style="width: 140px; height: 140px; margin: 0 auto 15px auto; filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.6));"></div>

    <!-- Title with Font_SIPA26 -->
    <h1 class="construction-title">UNDER CONSTRUCTION</h1>
    <p class="subtitle">SIPA FESTIVAL 2026 IS COMING SOON</p>

    <!-- Embed Instagram SIPA Festival -->
    <div class="ig-embed-card">
      <iframe src="https://www.instagram.com/sipafestival/embed" allowtransparency="true" scrolling="no"></iframe>
      <div>
        <a href="https://www.instagram.com/sipafestival" target="_blank" rel="noopener noreferrer" class="social-btn">
          <i class="fab fa-instagram fs-5"></i> Follow @sipafestival
        </a>
      </div>
    </div>
  </div>

  <footer>
    &copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      lottie.loadAnimation({
        container: document.getElementById('gears-animation'),
        renderer: 'svg',
        loop: true,
        autoplay: true,
        path: "{{ asset('animation/Gears%20Animation.json') }}"
      });
    });
  </script>
</body>
</html>
