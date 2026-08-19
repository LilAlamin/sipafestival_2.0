<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-50">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIPA Dashboard</title>

    <!-- Tailwind CSS & Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />

    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Montserrat', sans-serif;
        }
    </style>
</head>

<body class="h-full text-gray-900 antialiased">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        @include('admin.component.sidebar')
        
        <!-- Main Content Wrapper -->
        <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
            <!-- Top Header Bar -->
            <header class="bg-white border-b border-gray-150 py-4 px-8 flex items-center justify-between shrink-0">
                @hasSection('header_left')
                    @yield('header_left')
                @else
                    <div>
                        <h1 class="text-2xl font-extrabold text-[#4F1C51] tracking-tight">
                            Hi, {{ Auth::user()->name }}!
                        </h1>
                    </div>
                @endif
                <div class="flex items-center gap-4">
                    <span class="text-sm font-semibold text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                        Administrator
                    </span>
                </div>
            </header>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto p-8">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Modern Toast & Confirmation Modal System -->
    @include('admin.component.alerts')
</body>

</html>

