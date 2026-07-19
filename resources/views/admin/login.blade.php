<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPA Admin Login</title>

    <!-- Tailwind CSS & Vite -->
    @vite(['resources/css/app.css'])

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        /* Glow orbs */
        .glow-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            pointer-events: none;
        }

        .glow-orb-1 {
            width: 600px;
            height: 600px;
            background: radial-gradient(circle, rgba(212,168,83,0.12) 0%, transparent 70%);
            top: -150px;
            left: -100px;
        }

        .glow-orb-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(212,168,83,0.08) 0%, transparent 70%);
            bottom: -100px;
            right: -80px;
        }

        .glow-orb-3 {
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(100,116,139,0.1) 0%, transparent 70%);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        /* Gold divider */
        .gold-divider {
            width: 60px;
            height: 2px;
            background: linear-gradient(90deg, #C9953C, #D4A853, #E8C46A, #D4A853, #C9953C);
        }

        /* Card gold top bar */
        .card-gold-bar {
            height: 4px;
            background: linear-gradient(90deg, #C9953C, #D4A853, #E8C46A, #D4A853, #C9953C);
            border-radius: 1rem 1rem 0 0;
        }

        /* Button arrow animation */
        .btn-login .btn-arrow {
            transition: transform 0.25s ease;
        }

        .btn-login:hover .btn-arrow {
            transform: translateX(4px);
        }

        /* Focus gold ring on inputs */
        .input-sipa:focus {
            border-color: #D4A853;
            box-shadow: 0 0 0 3px rgba(212,168,83,0.12);
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .btn-login .btn-arrow { transition: none; }
        }
    </style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#0B0F19] via-[#141B2D] to-[#1E2433] relative flex items-center justify-center p-4 overflow-x-hidden">

    <!-- Background Glow Orbs -->
    <div class="glow-orb glow-orb-1"></div>
    <div class="glow-orb glow-orb-2"></div>
    <div class="glow-orb glow-orb-3"></div>

    <!-- Background Pattern (subtle) -->
    <div class="absolute inset-0 bg-repeat opacity-[0.06] pointer-events-none" style="background-image: url('/images/pattern/login_grid_pattern.svg'); background-size: 720px;"></div>

    <!-- Main Container -->
    <div class="w-full max-w-5xl flex flex-col lg:flex-row items-center justify-center gap-10 lg:gap-16 py-8 relative z-10">

        <!-- Left Side: Brand Panel (hidden on mobile) -->
        <div class="hidden lg:flex flex-col items-center justify-center w-1/2 gap-8">
            <!-- Logo -->
            <div class="flex items-center justify-center">
                <img src="/images/sipalogo.png" alt="SIPA Logo" class="w-72 h-auto object-contain brightness-0 invert opacity-90" />
            </div>

            <!-- Event name -->
            <div class="text-center space-y-3 mt-2">
                <div class="gold-divider mx-auto"></div>
                <p class="text-white/50 text-xs tracking-[0.35em] uppercase mt-4">
                    Solo International Performing Arts
                </p>
                <p class="text-[#D4A853]/70 text-[11px] tracking-[0.25em] uppercase">
                    Admin Portal
                </p>
            </div>
        </div>

        <!-- Right Side: Login Card -->
        <div class="w-full max-w-[420px]">
            <!-- Card wrapper -->
            <div class="bg-white rounded-2xl shadow-2xl shadow-black/30 overflow-hidden">

                <!-- Gold top bar -->
                <div class="card-gold-bar"></div>

                <!-- Card content -->
                <div class="px-8 pt-8 pb-10 md:px-10 md:pt-10 md:pb-12">

                    <!-- Mobile logo (shown only on mobile) -->
                    <div class="lg:hidden flex justify-center mb-6">
                        <img src="/images/sipalogo.png" alt="SIPA Logo" class="w-20 h-auto object-contain" style="filter: invert(17%) sepia(0%) saturate(0%) brightness(13%);" />
                    </div>

                    <!-- Heading -->
                    <div class="text-center mb-8">
                        <h2 class="text-2xl font-bold text-[#1E293B]" style="font-family: 'Playfair Display', serif;">
                            Welcome back
                        </h2>
                        <p class="text-sm text-[#64748B] mt-1.5">
                            Sign in to access the admin dashboard
                        </p>
                    </div>

                    <!-- Errors -->
                    @if($errors->any())
                        <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-600 text-sm rounded-xl flex items-start gap-2.5">
                            <i class="bi bi-exclamation-circle-fill mt-0.5 text-base"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <!-- Form -->
                    <form action="{{ route('loginbaru') }}" method="post" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div class="space-y-1.5">
                            <label for="email" class="block text-sm font-medium text-[#334155]">
                                Email
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i class="bi bi-envelope text-[#94A3B8] text-sm"></i>
                                </div>
                                <input type="email"
                                       name="email"
                                       id="email"
                                       value="{{ old('email') }}"
                                       placeholder="admin@sipafestival.com"
                                       class="input-sipa w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-[#F8FAFC] text-sm text-[#1E293B] placeholder-[#94A3B8] focus:outline-none transition-all duration-200"
                                       required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="space-y-1.5">
                            <label for="password" class="block text-sm font-medium text-[#334155]">
                                Password
                            </label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                    <i class="bi bi-lock text-[#94A3B8] text-sm"></i>
                                </div>
                                <input type="password"
                                       name="password"
                                       id="password"
                                       placeholder="Enter your password"
                                       class="input-sipa w-full pl-10 pr-11 py-3 rounded-xl border border-gray-200 bg-[#F8FAFC] text-sm text-[#1E293B] placeholder-[#94A3B8] focus:outline-none transition-all duration-200"
                                       required>
                                <button type="button" id="toggle-password" class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-[#94A3B8] hover:text-[#64748B] transition-colors focus:outline-none">
                                    <i class="bi bi-eye-slash text-sm" id="toggle-icon"></i>
                                </button>
                            </div>
                        </div>

                        <!-- Submit -->
                        <button type="submit"
                                class="btn-login w-full py-3.5 px-4 bg-[#1E293B] hover:bg-[#0F172A] text-white font-semibold rounded-xl transition-all duration-200 text-sm mt-6 shadow-md shadow-black/15 flex items-center justify-center gap-2 group cursor-pointer">
                            <span>Login</span>
                            <i class="bi bi-arrow-right btn-arrow text-sm"></i>
                        </button>
                    </form>

                </div>
            </div>

            <!-- Footer text -->
            <p class="text-center text-white/30 text-xs mt-5 tracking-wide">
                &copy; {{ date('Y') }} SIPA Festival
            </p>
        </div>

    </div>

    <!-- Password visibility toggle script -->
    <script>
        document.getElementById('toggle-password').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            const toggleIcon = document.getElementById('toggle-icon');

            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordField.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });
    </script>
</body>
</html>
