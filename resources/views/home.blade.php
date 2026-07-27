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
  
  <!-- Google Fonts: Plus Jakarta Sans / Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

  <style>
    @font-face {
      font-family: 'Font_SIPA26';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Bold.ttf') }}") format('truetype');
      font-weight: bold;
      font-style: normal;
    }

    @font-face {
      font-family: 'Font_SIPA26-Italic';
      src: url("{{ asset('assets/Font_SIPA26/CormorantGaramond-Italic.ttf') }}") format('truetype');
      font-weight: normal;
      font-style: italic;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Plus Jakarta Sans', 'Poppins', sans-serif;
      min-height: 100vh;
      background-color: #0b0c10;
      color: #ffffff;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      align-items: center;
      position: relative;
      overflow-x: hidden;
      padding: 40px 20px;
    }

    /* Fixed Background Image Layer */
    .bg-layer {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background-image: url("{{ asset('images/background26.webp') }}");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      z-index: -2;
    }

    /* Dark Radial Vignette Overlay */
    .bg-overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100vw;
      height: 100vh;
      background: radial-gradient(circle at center, rgba(0, 0, 0, 0.2) 0%, rgba(0, 0, 0, 0.65) 100%);
      z-index: -1;
      pointer-events: none;
    }

    .header-logo {
      width: 100%;
      text-align: center;
      margin-bottom: 40px;
    }

    .logo-img {
      max-width: 230px;
      width: 100%;
      height: auto;
      filter: drop-shadow(0 4px 15px rgba(0, 0, 0, 0.7));
      animation: fadeInDown 1.2s ease-out forwards;
    }

    /* Layout Container from Figma OPSI 2 (width 918px, left-positioned matching x=83px in Figma) */
    .opsi2-layout {
      position: relative;
      z-index: 2;
      width: 100%;
      max-width: 918px;
      margin-left: clamp(20px, 6vw, 100px);
      margin-right: auto;
      text-align: left;
    }

    .text-section {
      margin-bottom: 35px;
      animation: fadeInUp 1.2s ease-out forwards;
    }

    .construction-title {
      font-family: 'Font_SIPA26', serif;
      font-size: clamp(2rem, 4.5vw, 56px);
      font-weight: 700;
      letter-spacing: 2px;
      text-transform: uppercase;
      color: #ffffff;
      line-height: 1.2;
      margin-bottom: 12px;
      text-shadow: 0 4px 20px rgba(0, 0, 0, 0.8);
    }

    .subtitle-row {
      display: flex;
      flex-wrap: wrap;
      align-items: baseline;
      gap: 12px;
      font-size: clamp(1.2rem, 2.5vw, 30px);
      color: #ffffff;
      text-shadow: 0 2px 10px rgba(0, 0, 0, 0.8);
    }

    .subtitle-bold {
      font-weight: 700;
    }

    .subtitle-italic {
      font-family: 'Font_SIPA26-Italic', serif;
      font-style: italic;
      font-weight: 400;
      font-size: 1.35em;
      padding: 0 4px;
    }

    .subtitle-medium {
      font-weight: 500;
    }

    .ig-info-text {
      font-size: clamp(0.95rem, 1.8vw, 24px);
      font-weight: 500;
      color: rgba(255, 255, 255, 0.9);
      margin-bottom: 20px;
      line-height: 1.3;
      text-shadow: 0 2px 8px rgba(0, 0, 0, 0.8);
      animation: fadeInUp 1.4s ease-out forwards;
    }

    /* Instagram Wide Container (Figma OPSI 2 Rectangle 2 - Width 918px) */
    .ig-card-container {
      width: 100%;
      background: rgba(255, 255, 255, 0.12);
      backdrop-filter: blur(16px);
      -webkit-backdrop-filter: blur(16px);
      border: 1px solid rgba(255, 255, 255, 0.25);
      border-radius: 20px;
      padding: 24px;
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
      animation: fadeInUp 1.6s ease-out forwards;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 15px;
    }

    .ig-card-container iframe {
      width: 100%;
      height: 380px;
      border: none;
      border-radius: 14px;
      background: #ffffff;
    }

    .social-btn {
      display: inline-flex;
      align-items: center;
      gap: 10px;
      background: linear-gradient(135deg, #e1306c, #c13584, #833ab4);
      color: #ffffff;
      padding: 12px 32px;
      border-radius: 50px;
      font-weight: 700;
      text-decoration: none;
      font-size: 1rem;
      box-shadow: 0 8px 20px rgba(225, 48, 108, 0.4);
      transition: all 0.3s ease;
    }

    .social-btn:hover {
      color: #ffffff;
      transform: scale(1.05);
      box-shadow: 0 12px 25px rgba(225, 48, 108, 0.6);
    }

    /* Mascot Container on Bottom Right Side (Scrolls naturally with page) */
    .mascot-container {
      position: absolute;
      right: 0;
      bottom: 0;
      z-index: 3;
      pointer-events: none;
      animation: fadeInUp 1.4s ease-out forwards;
      display: flex;
      justify-content: flex-end;
      align-items: flex-end;
    }

    .mascot-img {
      height: clamp(560px, 86vh, 920px);
      width: auto;
      max-width: min(50vw, 840px);
      object-fit: contain;
      object-position: bottom right;
      filter: drop-shadow(0 20px 45px rgba(0, 0, 0, 0.95));
    }

    @media (max-width: 1200px) {
      .mascot-img {
        height: clamp(480px, 78vh, 780px);
        max-width: 46vw;
      }
    }

    @media (max-width: 991px) {
      .mascot-container {
        position: relative;
        right: auto;
        bottom: auto;
        margin: 20px auto 0 auto;
        text-align: center;
        justify-content: center;
      }

      .mascot-img {
        height: auto;
        max-width: 320px;
        max-height: none;
      }
    }

    footer {
      position: relative;
      z-index: 2;
      padding-top: 30px;
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

  <!-- Top Centered Logo -->
  <div class="header-logo">
    <img src="{{ asset('images/logo_putih.png') }}" alt="Logo SIPA Festival" class="logo-img">
  </div>

  <!-- Layout Container from Figma OPSI 2 (Max Width 918px, Left Aligned Content) -->
  <div class="opsi2-layout">
    <div class="text-section">
      <!-- Title: WEBSITE UNDER CONSTRUCTION -->
      <h1 class="construction-title">WEBSITE UNDER CONSTRUCTION</h1>
      
      <!-- Subtitle: SIPA Festival 2026 is Coming Soon -->
      <div class="subtitle-row">
        <span class="subtitle-bold">SIPA Festival 2026</span>
        <span class="subtitle-italic">is</span>
        <span class="subtitle-medium">Coming Soon</span>
      </div>
    </div>

    <!-- Instagram Section -->
    <div class="instagram-section">
      <p class="ig-info-text">
        for more information, follow <strong>@sipafestival</strong> on instagram
      </p>

      <!-- Wide Rectangle 2 Instagram Card Container -->
      <div class="ig-card-container">
        <iframe src="https://www.instagram.com/sipafestival/embed" allowtransparency="true" scrolling="no"></iframe>
        <a href="https://www.instagram.com/sipafestival" target="_blank" rel="noopener noreferrer" class="social-btn">
          <i class="fab fa-instagram fs-5"></i> Follow @sipafestival
        </a>
      </div>
    </div>
  </div>

  <!-- Mascot Image on the Right Side -->
  <div class="mascot-container">
    <img src="{{ asset('images/maskot/gondrong_gunarto.webp') }}" alt="Maskot Gondrong Gunarto" class="mascot-img">
  </div>

  <footer>
    &copy; {{ date('Y') }} SIPA Festival. All Rights Reserved.
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
