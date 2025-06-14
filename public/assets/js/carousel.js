document.addEventListener("DOMContentLoaded", () => {
    const container = document.querySelector(".delegates-wrapper");
    const indicatorContainer = document.querySelector(".slider-indicator");

    // Hentikan jika elemen penting tidak ditemukan
    if (!container || !indicatorContainer) {
        console.error("Slider elements not found!");
        return;
    }

    // Simpan item asli sekali saja untuk menghindari kebingungan dengan kloningan
    const originalItems = Array.from(
        container.querySelectorAll(".delegate-item")
    );
    if (originalItems.length === 0) return;

    let itemsPerSlide = 4;
    let totalSlides = 0;
    let currentIndex = 0;
    let interval;

    // --- FUNGSI HELPER UNTUK OPTIMASI (DEBOUNCE) ---
    // Ini mencegah fungsi dijalankan berulang kali saat resize, demi performa.
    function debounce(func, delay) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), delay);
        };
    }

    // --- FUNGSI UTAMA UNTUK MEMBANGUN SLIDER ---
    function initializeSlider() {
        // Hentikan autoplay yang sedang berjalan
        clearInterval(interval);

        // --- 1. TENTUKAN itemsPerSlide BERDASARKAN LEBAR LAYAR ---
        const screenWidth = window.innerWidth;
        if (screenWidth < 768) {
            // Ukuran Mobile
            itemsPerSlide = 1;
        } else if (screenWidth < 1024) {
            // Ukuran Tablet
            itemsPerSlide = 2;
        } else {
            // Ukuran Desktop
            itemsPerSlide = 4;
        }

        // Hentikan jika jumlah item lebih sedikit dari yang perlu ditampilkan
        if (originalItems.length <= itemsPerSlide) {
            container.style.transform = "translateX(0px)";
            indicatorContainer.innerHTML = "";
            return;
        }

        // --- 2. RESET SLIDER KE KONDISI AWAL ---
        container.style.transition = "none"; // Matikan transisi sementara
        container.innerHTML = ""; // Kosongkan container dari item lama dan kloningan
        originalItems.forEach((item) => container.appendChild(item)); // Isi kembali dengan item asli
        indicatorContainer.innerHTML = ""; // Kosongkan indikator lama
        currentIndex = 0;

        // --- 3. SETUP ULANG SLIDER DENGAN KONFIGURASI BARU ---
        const items = container.querySelectorAll(".delegate-item");
        const itemWidth = items[0].offsetWidth + 30; // Hitung ulang lebar item
        totalSlides = Math.ceil(items.length / itemsPerSlide);

        // Clone item sesuai jumlah `itemsPerSlide` yang baru
        for (let i = 0; i < itemsPerSlide; i++) {
            const clone = items[i].cloneNode(true);
            container.appendChild(clone);
        }

        // Atur ulang lebar container
        container.style.width =
            (items.length + itemsPerSlide) * itemWidth + "px";

        // Buat ulang indikator
        for (let i = 0; i < totalSlides; i++) {
            const dot = document.createElement("span");
            if (i === 0) dot.classList.add("active");
            dot.dataset.index = i;
            indicatorContainer.appendChild(dot);
        }

        // Posisikan slider ke awal
        goToSlide(0, false);

        // Hidupkan kembali transisi setelah setup selesai
        setTimeout(() => {
            container.style.transition =
                "transform 0.7s cubic-bezier(0.4,0,0.2,1)";
        }, 50);

        // Mulai lagi autoplay
        startAutoSlide();
    }

    function goToSlide(index, animated = true) {
        currentIndex = index;
        const itemWidth = originalItems[0].offsetWidth + 30;
        const translateX = currentIndex * itemWidth * itemsPerSlide;

        if (!animated) container.style.transition = "none";
        else
            container.style.transition =
                "transform 0.7s cubic-bezier(0.4,0,0.2,1)";

        container.style.transform = `translateX(-${translateX}px)`;

        // Update indikator
        const indicators = indicatorContainer.querySelectorAll("span");
        indicators.forEach((dot, i) => {
            dot.classList.toggle("active", i === currentIndex % totalSlides);
        });
    }

    function startAutoSlide() {
        clearInterval(interval);
        interval = setInterval(() => {
            currentIndex++;
            goToSlide(currentIndex, true);

            // Logika "lompatan ajaib" untuk infinite loop
            if (currentIndex === totalSlides) {
                setTimeout(() => {
                    goToSlide(0, false);
                    currentIndex = 0;
                }, 700);
            }
        }, 3000);
    }

    // --- EVENT LISTENER ---
    // Inisialisasi slider saat halaman pertama kali dimuat
    initializeSlider();

    // Inisialisasi ulang slider setiap kali ukuran jendela diubah (dengan debounce)
    window.addEventListener("resize", debounce(initializeSlider, 250));

    // Event listener untuk klik indikator (didelegasikan ke parent)
    indicatorContainer.addEventListener("click", (e) => {
        if (e.target.tagName === "SPAN") {
            const index = parseInt(e.target.dataset.index);
            goToSlide(index);
            startAutoSlide(); // reset timer
        }
    });
});
