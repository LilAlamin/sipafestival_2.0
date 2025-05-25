  <style>
    .sidebar-link {
      border-radius: 12px;
      transition: all 0.3s ease;
    }

    .icon-wrapper {
      background-color: #ffffff;
      color: #4F1C51;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .sidebar-link.active .icon-wrapper {
      background-color: #4F1C51;
      color: #ffffff;
    }

    .sidebar-icon {
      fill: currentColor;
      transition: fill 0.3s ease;
    }

    .sidebar-link span {
      color: #4F1C51;
      transition: color 0.3s ease;
    }

    .sidebar-link.active span {
      color: #4F1C51;
      font-weight: bold;
    }

    .nav-link.active {
      background-color: white !important; /* atau warna yang kamu mau */
      color: inherit !important;

      box-shadow: 0 .125rem .25rem rgba(0, 0, 0, .075) !important;
    }

  </style>

<!-- Sidebar -->
  <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
    <a href="/" class="justify-content-center d-md-block mb-3 text-center">
      <img src="/images/logosipafestival2025.png" alt="sipafestival2025" width="100" height="75" />
    </a>

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/admin/dashboard" class="sidebar-link nav-link d-flex align-items-center active">
          <div class="icon-wrapper p-2 me-2 shadow-sm">
            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="16"
              viewBox="0 0 384 512">
              <path
                d="M0 64C0 28.7 28.7 0 64 0L224 0v128c0 17.7 14.3 32 32 32h128v288c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V64zm384 64h-128V0l128 128z" />
            </svg>
          </div>
          <span>Seluruh Aduan</span>
        </a>
      </li>
      <li>
        <a href="" class="sidebar-link nav-link d-flex align-items-center">
          <div class="icon-wrapper p-2 me-2 shadow-sm">
            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="16"
              viewBox="0 0 512 512">
              <path
                d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4 0-26.5-21.5-48-48-48H48zM0 176v208c0 35.3 28.7 64 64 64h384c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
            </svg>
          </div>
          <span>Belum Dibaca</span>
        </a>
      </li>
      <li>
        <a href="#" class="sidebar-link nav-link d-flex align-items-center">
          <div class="icon-wrapper p-2 me-2 shadow-sm">
            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="16"
              viewBox="0 0 512 512">
              <path
                d="M512 240c0 114.9-114.6 208-256 208-37.1 0-72.3-6.4-104.1-17.9-11.9 8.7-31.3 20.6-54.3 30.6-45.9 20.3-74.8 29.2-103.5 29.2-6.5 0-12.3-3.9-14.8-9.9-2.5-6-1.1-12.8 3.4-17.4 1.1-1.2 2.8-3.1 4.9-5.7 4.1-5 9.6-12.4 15.2-21.6 10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240 0 125.1 114.6 32 256 32s256 93.1 256 208z" />
            </svg>
          </div>
          <span>Sudah Dibaca</span>
        </a>
      </li>
      <li>
        <a href="#" class="sidebar-link nav-link d-flex align-items-center">
          <div class="icon-wrapper p-2 me-2 shadow-sm">
            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="16"
              viewBox="0 0 512 512">
              <path
                d="M512 240c0 114.9-114.6 208-256 208-37.1 0-72.3-6.4-104.1-17.9-11.9 8.7-31.3 20.6-54.3 30.6-45.9 20.3-74.8 29.2-103.5 29.2-6.5 0-12.3-3.9-14.8-9.9-2.5-6-1.1-12.8 3.4-17.4 1.1-1.2 2.8-3.1 4.9-5.7 4.1-5 9.6-12.4 15.2-21.6 10-16.6 19.5-38.4 21.4-62.9C17.7 326.8 0 285.1 0 240 0 125.1 114.6 32 256 32s256 93.1 256 208z" />
            </svg>
          </div>
          <span>Daftar Berita</span>
        </a>
      </li>
    </ul>

    <hr />

    <ul class="nav nav-pills flex-column mb-auto">
      <li>
        <a href="#" class="sidebar-link nav-link d-flex align-items-center">
          <div class="icon-wrapper p-2 me-2 shadow-sm">
            <svg class="sidebar-icon" xmlns="http://www.w3.org/2000/svg" width="25" height="16"
              viewBox="0 0 512 512">
              <path
                d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9-18.7 0-33.9-15.2-33.9-33.9v-62.1h-128c-17.7 0-32-14.3-32-32v-64c0-17.7 14.3-32 32-32h128v-62.1c0-18.7 15.2-33.9 33.9-33.9 9 0 17.6 3.6 24 9.9zM160 96H96c-17.7 0-32 14.3-32 32v256c0 17.7 14.3 32 32 32h64c17.7 0 32 14.3 32 32s-14.3 32-32 32H96c-53 0-96-43-96-96V128C0 75 43 32 96 32h64c17.7 0 32 14.3 32 32s-14.3 32-32 32z" />
            </svg>
          </div>
          <span>Log Out</span>
        </a>
      </li>
    </ul>
  </div>

  <script>
    document.querySelectorAll('.sidebar-link').forEach(link => {
      link.addEventListener('click', function (e) {
        e.preventDefault();
        document.querySelectorAll('.sidebar-link').forEach(el => el.classList.remove('active'));
        this.classList.add('active');
      });
    });
  </script>