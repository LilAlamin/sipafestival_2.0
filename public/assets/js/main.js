const slides = document.querySelectorAll('.img-slide');
  let index = 0;

  setInterval(() => {
    slides[index].classList.add('d-none'); // Sembunyikan gambar sekarang
    index = (index + 1) % slides.length;
    slides[index].classList.remove('d-none'); // Tampilkan gambar berikutnya
  }, 3000);





  function openVideo() {
  const thumbnail = document.getElementById('thumbnail');
  const iframe = document.getElementById('videoIframe');
  const youtubeLink = "https://www.youtube.com/embed/rJtSeMMQY9g?autoplay=1"; // Autoplay enabled

  thumbnail.style.display = 'none';
  iframe.src = youtubeLink;
  iframe.style.display = 'block';
}





  let currentPosition = 0;
  const container = document.getElementById('delegatesContainer');
  const containerWrapper = container.parentElement;
  const itemWidth = 250; // 220 + 2*15px margin

  function scrollLeft() {
    const maxScroll = 0;

    currentPosition += itemWidth;
    if (currentPosition > maxScroll) {
      currentPosition = maxScroll;
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }

  function scrollRight() {
    const containerWidth = container.scrollWidth;
    const wrapperWidth = containerWrapper.offsetWidth;
    const maxScroll = wrapperWidth - containerWidth;

    currentPosition -= itemWidth;
    if (currentPosition < maxScroll) {
      currentPosition = maxScroll;
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }

  // AUTO SCROLL tiap 3 detik
  setInterval(() => {
    const containerWidth = container.scrollWidth;
    const wrapperWidth = containerWrapper.offsetWidth;
    const maxScroll = wrapperWidth - containerWidth;

    currentPosition -= itemWidth;
    if (currentPosition < maxScroll) {
      currentPosition = 0; // kalau sudah mentok kanan, reset ke awal
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }, 1500);


  // AJAX untuk mengirim form
  $(document).ready(function () {
    $('#submissionForm').submit(function (e) {
      e.preventDefault(); // mencegah reload halaman

      const form = $(this);
      const url = form.attr('action');
      const formData = form.serialize();

      $.ajax({
        type: "POST",
        url: url,
        data: formData,
        success: function (response) {
          // Tampilkan notifikasi sukses
          Swal.fire({
            toast: true,
            icon: 'success',
            title: 'Form berhasil dikirim!',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });

          form[0].reset(); // reset form jika perlu
        },
        error: function (xhr, status, error) {
          Swal.fire({
            toast: true,
            icon: 'error',
            title: 'Gagal mengirim form!',
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true
          });

          console.log(xhr.responseText);
        }
      });
    });
  });

  (function() {
    var targetDate = new Date(Date.UTC(2025, 8, 4, 12, 0, 0)); // 4 Sep 2025, 19:00 WIB (UTC+7)
    
    function updateCountdown() {
        var now = new Date();
        var diff = targetDate - now;

        if (diff <= 0) {
        document.getElementById("countdown").innerHTML = "The event has started!";
        clearInterval(timerInterval);
        return;
        }

        var totalSeconds = Math.floor(diff / 1000);
        var days = Math.floor(totalSeconds / (3600 * 24));
        var hours = Math.floor((totalSeconds % (3600 * 24)) / 3600);
        var minutes = Math.floor((totalSeconds % 3600) / 60);
        var seconds = totalSeconds % 60;

        // Isi setiap elemen countdown
        document.getElementById("days").textContent = days;
        document.getElementById("hours").textContent = ("0" + hours).slice(-2);
        document.getElementById("minutes").textContent = ("0" + minutes).slice(-2);
        document.getElementById("seconds").textContent = ("0" + seconds).slice(-2);
    }

    updateCountdown();
    var timerInterval = setInterval(updateCountdown, 1000);
    })();
