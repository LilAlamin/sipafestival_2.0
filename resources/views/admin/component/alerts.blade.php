<!-- ==========================================================
     SIPA FESTIVAL - MODERN CUSTOM TOAST & CONFIRMATION MODAL
     Zero-dependency, Tailwind CSS v4 & Vanilla JS
     ========================================================== -->

<!-- Toast Floating Container -->
<div id="sipa-toast-container" 
     class="fixed top-5 right-5 z-[99999] flex flex-col gap-3 max-w-sm sm:max-w-md w-full pointer-events-none p-2 sm:p-0">
</div>

<!-- Custom Confirmation Modal Backdrop & Dialog -->
<div id="sipa-confirm-modal" 
     class="fixed inset-0 z-[100000] hidden items-center justify-center p-4 bg-slate-950/60 backdrop-blur-sm transition-opacity duration-300 opacity-0 pointer-events-none"
     aria-hidden="true">
    
    <!-- Modal Card -->
    <div id="sipa-confirm-card" 
         class="bg-white rounded-3xl p-6 sm:p-7 max-w-md w-full shadow-2xl border border-gray-150 transform transition-all duration-300 scale-95 opacity-0 text-center relative overflow-hidden">
        
        <!-- Header Glow Accent -->
        <div id="sipa-confirm-glow" class="absolute -top-12 left-1/2 -translate-x-1/2 w-48 h-24 bg-rose-500/10 rounded-full blur-xl pointer-events-none"></div>

        <!-- Dynamic Icon Badge -->
        <div id="sipa-confirm-icon-wrap" class="w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center text-2xl shadow-sm transition-all relative">
            <div id="sipa-confirm-icon-pulse" class="absolute inset-0 rounded-2xl animate-ping opacity-20"></div>
            <i id="sipa-confirm-icon" class="bi bi-trash3-fill relative z-10"></i>
        </div>

        <!-- Title & Subtitle -->
        <h3 id="sipa-confirm-title" class="text-lg sm:text-xl font-black text-gray-900 tracking-tight mb-2">
            Konfirmasi Tindakan
        </h3>
        <p id="sipa-confirm-message" class="text-xs sm:text-sm text-gray-500 font-medium leading-relaxed mb-6">
            Apakah Anda yakin ingin melanjutkan tindakan ini?
        </p>

        <!-- Action Buttons -->
        <div class="flex items-center justify-center gap-3">
            <button type="button" 
                    id="sipa-confirm-cancel-btn"
                    class="flex-1 px-5 py-2.5 rounded-xl border border-gray-200 bg-white hover:bg-gray-50 text-gray-700 text-xs sm:text-sm font-bold transition-all shadow-xs cursor-pointer active:scale-95">
                Batal
            </button>
            <button type="button" 
                    id="sipa-confirm-action-btn"
                    class="flex-1 px-5 py-2.5 rounded-xl bg-rose-600 hover:bg-rose-700 text-white text-xs sm:text-sm font-bold transition-all shadow-md cursor-pointer flex items-center justify-center gap-2 active:scale-95">
                <span id="sipa-confirm-btn-text">Ya, Lanjutkan</span>
                <svg id="sipa-confirm-btn-spinner" class="animate-spin -ml-1 mr-1 h-4 w-4 text-white hidden" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
            </button>
        </div>

    </div>
</div>

<style>
    /* Toast Animations */
    @keyframes sipaToastSlideIn {
        0% {
            opacity: 0;
            transform: translateX(100%) scale(0.92);
        }
        70% {
            transform: translateX(-4px) scale(1.02);
        }
        100% {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }

    @keyframes sipaToastSlideOut {
        0% {
            opacity: 1;
            transform: translateX(0) scale(1);
            max-height: 120px;
            margin-bottom: 0.75rem;
        }
        100% {
            opacity: 0;
            transform: translateX(120%) scale(0.85);
            max-height: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }
    }

    .sipa-toast-enter {
        animation: sipaToastSlideIn 0.35s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .sipa-toast-exit {
        animation: sipaToastSlideOut 0.3s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }

    /* Progress bar smooth linear shrink */
    .sipa-progress-bar {
        transition: width linear;
    }
</style>

<script>
/**
 * SIPA Modern Toast & Confirmation Dialog Engine
 */
(function() {
    'use strict';

    // ==========================================
    // 1. TOAST ENGINE
    // ==========================================
    const toastConfig = {
        success: {
            icon: 'bi-check2-circle',
            bgIcon: 'bg-emerald-50 text-emerald-600 border border-emerald-200',
            border: 'border-emerald-500/30',
            barColor: 'bg-emerald-500',
            titleDefault: 'Berhasil!'
        },
        error: {
            icon: 'bi-exclamation-octagon-fill',
            bgIcon: 'bg-rose-50 text-rose-600 border border-rose-200',
            border: 'border-rose-500/30',
            barColor: 'bg-rose-500',
            titleDefault: 'Gagal!'
        },
        warning: {
            icon: 'bi-exclamation-triangle-fill',
            bgIcon: 'bg-amber-50 text-amber-600 border border-amber-200',
            border: 'border-amber-500/30',
            barColor: 'bg-amber-500',
            titleDefault: 'Peringatan!'
        },
        info: {
            icon: 'bi-info-circle-fill',
            bgIcon: 'bg-purple-50 text-[#4F1C51] border border-purple-200',
            border: 'border-purple-500/30',
            barColor: 'bg-[#4F1C51]',
            titleDefault: 'Informasi'
        }
    };

    window.Toast = {
        show: function(options) {
            const container = document.getElementById('sipa-toast-container');
            if (!container) return;

            let type = (options.type || 'info').toLowerCase();
            if (!toastConfig[type]) type = 'info';

            const cfg = toastConfig[type];
            const title = options.title || cfg.titleDefault;
            const message = options.message || '';
            const duration = typeof options.duration === 'number' ? options.duration : 4000;

            // Create toast element
            const toastEl = document.createElement('div');
            toastEl.className = `pointer-events-auto bg-white/95 backdrop-blur-md rounded-2xl border ${cfg.border} shadow-xl shadow-slate-200/50 p-4 sm:p-4.5 relative overflow-hidden sipa-toast-enter flex items-start gap-3.5 transition-all`;

            toastEl.innerHTML = `
                <div class="w-10 h-10 rounded-xl ${cfg.bgIcon} flex items-center justify-center text-lg shrink-0 shadow-xs">
                    <i class="bi ${cfg.icon}"></i>
                </div>
                <div class="flex-1 min-w-0 pr-6">
                    <h4 class="text-xs sm:text-sm font-black text-gray-900 tracking-tight leading-snug">
                        ${escapeHtml(title)}
                    </h4>
                    ${message ? `<p class="text-xs text-gray-600 font-medium leading-relaxed mt-0.5">${escapeHtml(message)}</p>` : ''}
                </div>
                <button type="button" 
                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-700 w-6 h-6 rounded-lg flex items-center justify-center hover:bg-gray-100 transition-all cursor-pointer"
                        title="Tutup">
                    <i class="bi bi-x text-lg leading-none"></i>
                </button>
                <div class="absolute bottom-0 left-0 right-0 h-1 bg-gray-100/60 overflow-hidden">
                    <div class="sipa-progress-bar h-full ${cfg.barColor} w-full"></div>
                </div>
            `;

            container.appendChild(toastEl);

            const closeBtn = toastEl.querySelector('button');
            const progressBar = toastEl.querySelector('.sipa-progress-bar');

            let remainingTime = duration;
            let startTime = Date.now();
            let timerId = null;
            let isPaused = false;

            function startTimer() {
                if (duration <= 0) return;
                progressBar.style.transitionDuration = `${remainingTime}ms`;
                progressBar.style.width = '0%';
                
                timerId = setTimeout(() => {
                    dismiss();
                }, remainingTime);
            }

            function pauseTimer() {
                if (duration <= 0 || isPaused) return;
                isPaused = true;
                clearTimeout(timerId);
                const elapsed = Date.now() - startTime;
                remainingTime = Math.max(0, remainingTime - elapsed);
                // Freeze width
                const computedWidth = window.getComputedStyle(progressBar).width;
                progressBar.style.transitionDuration = '0s';
                progressBar.style.width = computedWidth;
            }

            function resumeTimer() {
                if (duration <= 0 || !isPaused) return;
                isPaused = false;
                startTime = Date.now();
                startTimer();
            }

            function dismiss() {
                clearTimeout(timerId);
                toastEl.classList.remove('sipa-toast-enter');
                toastEl.classList.add('sipa-toast-exit');
                toastEl.addEventListener('animationend', () => {
                    if (toastEl.parentNode) {
                        toastEl.parentNode.removeChild(toastEl);
                    }
                }, { once: true });
            }

            closeBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                dismiss();
            });

            toastEl.addEventListener('mouseenter', pauseTimer);
            toastEl.addEventListener('mouseleave', resumeTimer);

            startTimer();
            return { dismiss };
        },

        success: function(titleOrMsg, maybeMsg, duration) {
            if (maybeMsg === undefined) {
                return this.show({ type: 'success', title: 'Berhasil!', message: titleOrMsg, duration });
            }
            return this.show({ type: 'success', title: titleOrMsg, message: maybeMsg, duration });
        },

        error: function(titleOrMsg, maybeMsg, duration) {
            if (maybeMsg === undefined) {
                return this.show({ type: 'error', title: 'Terjadi Kesalahan!', message: titleOrMsg, duration });
            }
            return this.show({ type: 'error', title: titleOrMsg, message: maybeMsg, duration });
        },

        warning: function(titleOrMsg, maybeMsg, duration) {
            if (maybeMsg === undefined) {
                return this.show({ type: 'warning', title: 'Perhatian!', message: titleOrMsg, duration });
            }
            return this.show({ type: 'warning', title: titleOrMsg, message: maybeMsg, duration });
        },

        info: function(titleOrMsg, maybeMsg, duration) {
            if (maybeMsg === undefined) {
                return this.show({ type: 'info', title: 'Informasi', message: titleOrMsg, duration });
            }
            return this.show({ type: 'info', title: titleOrMsg, message: maybeMsg, duration });
        }
    };

    function escapeHtml(string) {
        if (!string) return '';
        const entityMap = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#39;'
        };
        return String(string).replace(/[&<>"']/g, s => entityMap[s]);
    }


    // ==========================================
    // 2. CONFIRMATION MODAL ENGINE
    // ==========================================
    let currentConfirmCallback = null;

    const modalThemes = {
        danger: {
            icon: 'bi-trash3-fill',
            iconWrap: 'bg-rose-50 text-rose-600 border border-rose-200',
            pulse: 'bg-rose-400',
            glow: 'bg-rose-500/15',
            btnClass: 'bg-rose-600 hover:bg-rose-700 text-white',
            btnTextDefault: 'Ya, Hapus'
        },
        warning: {
            icon: 'bi-exclamation-triangle-fill',
            iconWrap: 'bg-amber-50 text-amber-600 border border-amber-200',
            pulse: 'bg-amber-400',
            glow: 'bg-amber-500/15',
            btnClass: 'bg-amber-600 hover:bg-amber-700 text-white',
            btnTextDefault: 'Ya, Lanjutkan'
        },
        info: {
            icon: 'bi-question-circle-fill',
            iconWrap: 'bg-purple-50 text-[#4F1C51] border border-purple-200',
            pulse: 'bg-purple-400',
            glow: 'bg-[#4F1C51]/15',
            btnClass: 'bg-[#4F1C51] hover:bg-[#3e1540] text-white',
            btnTextDefault: 'Konfirmasi'
        }
    };

    window.ConfirmDialog = {
        show: function(options) {
            const modal = document.getElementById('sipa-confirm-modal');
            const card = document.getElementById('sipa-confirm-card');
            const glow = document.getElementById('sipa-confirm-glow');
            const iconWrap = document.getElementById('sipa-confirm-icon-wrap');
            const iconPulse = document.getElementById('sipa-confirm-icon-pulse');
            const icon = document.getElementById('sipa-confirm-icon');
            const titleEl = document.getElementById('sipa-confirm-title');
            const messageEl = document.getElementById('sipa-confirm-message');
            const cancelBtn = document.getElementById('sipa-confirm-cancel-btn');
            const actionBtn = document.getElementById('sipa-confirm-action-btn');
            const btnText = document.getElementById('sipa-confirm-btn-text');
            const btnSpinner = document.getElementById('sipa-confirm-btn-spinner');

            if (!modal || !card) return;

            let type = options.type || 'danger';
            if (!modalThemes[type]) type = 'danger';
            const theme = modalThemes[type];

            // Set content
            titleEl.textContent = options.title || 'Konfirmasi Tindakan';
            messageEl.textContent = options.message || options.text || 'Apakah Anda yakin ingin melanjutkan?';
            btnText.textContent = options.confirmButtonText || options.confirmText || theme.btnTextDefault;
            cancelBtn.textContent = options.cancelButtonText || options.cancelText || 'Batal';

            // Set theme styles
            glow.className = `absolute -top-12 left-1/2 -translate-x-1/2 w-48 h-24 ${theme.glow} rounded-full blur-xl pointer-events-none`;
            iconWrap.className = `w-16 h-16 rounded-2xl mx-auto mb-4 flex items-center justify-center text-2xl shadow-sm transition-all relative ${theme.iconWrap}`;
            iconPulse.className = `absolute inset-0 rounded-2xl animate-ping opacity-20 ${theme.pulse}`;
            icon.className = `bi ${options.icon || theme.icon} relative z-10`;

            // Reset action button classes
            actionBtn.className = `flex-1 px-5 py-2.5 rounded-xl ${theme.btnClass} text-xs sm:text-sm font-bold transition-all shadow-md cursor-pointer flex items-center justify-center gap-2 active:scale-95`;
            actionBtn.disabled = false;
            btnSpinner.classList.add('hidden');

            currentConfirmCallback = options.onConfirm || null;

            // Show Modal
            modal.classList.remove('hidden');
            modal.classList.remove('pointer-events-none');
            setTimeout(() => {
                modal.classList.remove('opacity-0');
                modal.classList.add('opacity-100');
                card.classList.remove('scale-95', 'opacity-0');
                card.classList.add('scale-100', 'opacity-100');
            }, 10);
        },

        close: function() {
            const modal = document.getElementById('sipa-confirm-modal');
            const card = document.getElementById('sipa-confirm-card');
            if (!modal || !card) return;

            modal.classList.remove('opacity-100');
            modal.classList.add('opacity-0');
            card.classList.remove('scale-100', 'opacity-100');
            card.classList.add('scale-95', 'opacity-0');

            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.add('pointer-events-none');
                currentConfirmCallback = null;
            }, 250);
        }
    };

    // Setup Modal Buttons Event Listeners
    document.addEventListener('DOMContentLoaded', () => {
        const modal = document.getElementById('sipa-confirm-modal');
        const cancelBtn = document.getElementById('sipa-confirm-cancel-btn');
        const actionBtn = document.getElementById('sipa-confirm-action-btn');
        const btnSpinner = document.getElementById('sipa-confirm-btn-spinner');

        if (cancelBtn) {
            cancelBtn.addEventListener('click', () => {
                ConfirmDialog.close();
            });
        }

        if (modal) {
            modal.addEventListener('click', (e) => {
                if (e.target === modal) {
                    ConfirmDialog.close();
                }
            });
        }

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && modal && !modal.classList.contains('hidden')) {
                ConfirmDialog.close();
            }
        });

        if (actionBtn) {
            actionBtn.addEventListener('click', () => {
                if (typeof currentConfirmCallback === 'function') {
                    // Show spinner and disable button
                    actionBtn.disabled = true;
                    if (btnSpinner) btnSpinner.classList.remove('hidden');
                    
                    try {
                        currentConfirmCallback();
                    } catch(err) {
                        console.error('Confirm callback error:', err);
                    }
                }
            });
        }
    });

    /**
     * Helper for Delete / Action Form Submissions
     * Usage in Blade:
     * <form ... onsubmit="return confirmDelete(event, 'Hapus Galeri?', 'Pesan custom...')">
     */
    window.confirmDelete = function(event, title, message, formElement) {
        if (event) {
            event.preventDefault();
            event.stopPropagation();
        }

        const targetForm = formElement || (event && event.target ? (event.target.tagName === 'FORM' ? event.target : event.target.closest('form')) : null);

        ConfirmDialog.show({
            title: title || 'Hapus Data?',
            message: message || 'Apakah Anda yakin ingin menghapus data ini? Tindakan ini tidak dapat dibatalkan.',
            confirmButtonText: 'Ya, Hapus Data',
            cancelButtonText: 'Batal',
            type: 'danger',
            icon: 'bi-trash3-fill',
            onConfirm: () => {
                if (targetForm) {
                    targetForm.submit();
                } else {
                    ConfirmDialog.close();
                }
            }
        });

        return false;
    };

    /**
     * Generic Confirm Action helper
     */
    window.confirmAction = function(options) {
        ConfirmDialog.show(options);
    };

    // ==========================================
    // 3. AUTO FLASH SESSIONS FROM LARAVEL BLADE
    // ==========================================
    document.addEventListener('DOMContentLoaded', () => {
        @if(session('success'))
            Toast.success('Berhasil!', {!! json_encode(session('success')) !!});
        @endif

        @if(session('error'))
            Toast.error('Gagal!', {!! json_encode(session('error')) !!});
        @endif

        @if(session('warning'))
            Toast.warning('Perhatian!', {!! json_encode(session('warning')) !!});
        @endif

        @if(session('info'))
            Toast.info('Informasi', {!! json_encode(session('info')) !!});
        @endif

        @if(session('status'))
            Toast.info('Status', {!! json_encode(session('status')) !!});
        @endif

        @if(isset($errors) && $errors->any())
            @php
                $errorList = $errors->all();
                $firstError = $errorList[0];
            @endphp
            Toast.error('Validasi Gagal', {!! json_encode($firstError) !!});
        @endif
    });

})();
</script>
