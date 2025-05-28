

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

  // AUTO SCROLL tiap 1 detik
  setInterval(() => {
    const containerWidth = container.scrollWidth;
    const wrapperWidth = containerWrapper.offsetWidth;
    const maxScroll = wrapperWidth - containerWidth;

    currentPosition -= itemWidth;
    if (currentPosition < maxScroll) {
      currentPosition = 0; // kalau sudah mentok kanan, reset ke awal
    }

    container.style.transform = `translateX(${currentPosition}px)`;
  }, 1000);


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

