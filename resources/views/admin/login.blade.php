<!DOCTYPE html>
<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SIPA Admin Login</title>
    
    <!-- Tailwind CSS & Vite -->
    @vite(['resources/css/app.css'])
    
    <!-- Font & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen bg-[#212529] relative flex items-center justify-center p-4 overflow-x-hidden">
    
    <!-- Background Pattern Overlay -->
    <div class="absolute inset-0 bg-repeat opacity-[0.20] pointer-events-none" style="background-image: url('/images/pattern/login_grid_pattern.svg'); background-size: 720px;"></div>
    
    <div class="w-full max-w-5xl flex flex-col md:flex-row items-center justify-center gap-12 md:gap-20 py-8 relative z-10">
        
        <!-- Left Side: Logo -->
        <div class="flex justify-center items-center w-full md:w-1/2">
            <img src="/images/sipalogo.png" alt="SIPA Logo" class="w-64 md:w-[380px] h-auto object-contain brightness-0 invert" />
        </div>
        
        <!-- Right Side: Login Card -->
        <div class="w-full max-w-md bg-white rounded-2xl p-8 md:p-10 shadow-2xl shadow-black/25">
            <h2 class="text-2xl font-bold text-[#212529] text-center mb-8">
                Login
            </h2>

            <!-- Errors Alert -->
            @if($errors->any())
                <div class="mb-5 p-4 bg-rose-50 border border-rose-100 text-rose-700 text-sm rounded-xl">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('loginbaru') }}" method="post" class="space-y-6">
                @csrf
                
                <!-- Email -->
                <div class="space-y-1.5">
                    <label for="email" class="block text-sm font-medium text-gray-700">
                        Email
                    </label>
                    <input type="email" 
                           name="email" 
                           id="email" 
                           value="{{ old('email') }}"
                           placeholder="Enter email"
                           class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:border-gray-400 focus:ring-1 focus:ring-gray-400 text-sm transition-all"
                           required>
                </div>

                <!-- Password -->
                <div class="space-y-1.5">
                    <label for="password" class="block text-sm font-medium text-gray-700">
                        Password
                    </label>
                    <div class="relative flex items-center">
                        <input type="password" 
                               name="password" 
                               id="password" 
                               placeholder="Enter password"
                               class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-200 focus:outline-none focus:border-gray-400 focus:ring-1 focus:ring-gray-400 text-sm transition-all"
                               required>
                        <!-- Password Visibility Toggle -->
                        <button type="button" id="toggle-password" class="absolute right-3 text-gray-400 hover:text-gray-600 transition-colors focus:outline-none">
                            <i class="bi bi-eye-slash text-base" id="toggle-icon"></i>
                        </button>
                    </div>
                </div>

                <!-- Submit -->
                <button type="submit" 
                        class="w-full py-3.5 px-4 bg-[#212529] hover:bg-[#343A40] text-white font-semibold rounded-lg transition-all text-sm mt-4 shadow-md">
                    Login
                </button>
            </form>
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