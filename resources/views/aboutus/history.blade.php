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
      background-image: url('{{ asset('images/pattern/BGSIPA.png') }}');
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
        Solo International Performing Arts (SIPA) merupakan festival seni pertunjukan tahunan yang diselenggarakan di Kota Solo sejak tahun 2009. Kementerian Pariwisata dan Ekonomi Kreatif memberikan apresiasi kepada SIPA dengan mengumumkan SIPA sebagai salah satu dari 100 wonderful events pada Kalender Event 2020.
      </p>
      <p style="text-align: justify;">
        Presiden Joko Widodo yang tahun 2009 menjabat sebagai Walikota Solo memprakarsai penyelenggaraan seni pertunjukan berskala internasional yang diwujudkan melalui SIPA. Dra. Irawati Kusumorasri, M.Sn. menyambut baik gagasan Pak Joko Widodo dengan menyelenggarakan SIPA.
      </p>
      <p style="text-align: justify;">
        Harapan Presiden Joko Widodo yang menjadi misi SIPA yaitu SIPA sebagai wadah diplomasi antar kota, antar negara, dan yang terpenting antara rakyat dengan rakyat.
      </p>
      <p style="text-align: justify;">
        Selama tiga hari penyelenggaraan SIPA, terdapat beragam pertunjukan tari, musik, dan teater yang berasal dari Indonesia dan mancanegara yang tampil pada panggung megah secara live. Multiplier effect SIPA juga telah dirasakan masyarakat Kota Solo yang tercermin dari para pedagang kuliner yang menjajakan masakannya di bazaar SIPA sekaligus peningkatan kunjungan wisatawan selama acara berlangsung.
      </p>
      <p style="text-align: justify;">
        Tahun 2009 hingga 2012, SIPA diselenggarakan di Pamedan Pura Mangkunegaran Solo secara live. SIPA mulai digelar di Benteng Vastenburg Solo sejak tahun 2013.
      </p>
      <p style="text-align: justify;">
        Sehubungan dengan pandemi COVID-19, SIPA 2020 akan hadir secara virtual. SIPA akan tayang secara live dari studio di Solo pada 10, 11, dan 12 September 2020 dari pukul 5 sore hingga 9 malam melalui YouTube SIPA FESTIVAL sebagai platform utama.
      </p>
      <p style="text-align: justify;">
        Setiap tahunnya, penonton SIPA mencapai 30.000 orang. Bahkan, SIPA 2019 mencetak angka 40,294 penonton selama tiga hari penyelenggaraan event. Melalui virtual festival, SIPA diharapkan mampu meraih 100.000 viewers.
      </p>
      <p style="text-align: justify;">
        Pada SIPA Virtual Festival 2020, viewers bukan hanya menyaksikan beragam seni pertunjukan dan melihat tayangan pariwisata Indonesia, tetapi juga dapat mengikuti lelang barang seni, sekaligus memberikan donasi kepada para seniman yang telah pensiun.
      </p>
    </div>
  </div>
</section>


<x-footer />
</body>
</html>