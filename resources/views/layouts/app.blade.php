<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Dashboard Penjualan')</title>
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            DEFAULT: '#6366f1',
                            dark: '#4f46e5',
                            light: '#818cf8',
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }

        .animation-delay-100 { animation-delay: 0.1s; }
        .animation-delay-200 { animation-delay: 0.2s; }
        .animation-delay-300 { animation-delay: 0.3s; }
        .animation-delay-400 { animation-delay: 0.4s; }

        .pagination svg {
            display: none !important;
        }
    </style>

    @stack('styles')
</head>
<body class="font-sans bg-gradient-to-br from-indigo-500 via-purple-500 to-purple-700 min-h-screen text-slate-700">
    
    <nav class="bg-white/95 backdrop-blur-lg shadow-lg border-b border-white/20 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('sales.dashboard') }}" 
                   class="flex items-center gap-2 text-2xl font-bold text-primary hover:text-primary-dark transition-all duration-300 hover:-translate-y-0.5">
                    <i class="bi bi-graph-up-arrow text-2xl"></i>
                    <span>Dashboard Penjualan</span>
                </a>

                <button type="button" 
                        class="lg:hidden inline-flex items-center justify-center p-2 rounded-lg text-slate-600 hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-primary"
                        onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                    <i class="bi bi-list text-2xl"></i>
                </button>

                <div class="hidden lg:flex items-center gap-2">
                    <a href="{{ route('sales.dashboard') }}" 
                       class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium text-white bg-primary hover:bg-primary-dark transition-all duration-300 hover:-translate-y-0.5 shadow-lg shadow-primary/30">
                        <i class="bi bi-speedometer2"></i>
                        <span>Dashboard</span>
                    </a>
                </div>
            </div>

            <div id="mobile-menu" class="hidden lg:hidden pb-4">
                <a href="{{ route('sales.dashboard') }}" 
                   class="flex items-center gap-2 px-4 py-2 rounded-lg font-medium text-white bg-primary hover:bg-primary-dark transition-all duration-300 mt-2">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </div>
        </div>
    </nav>

    <main class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            @yield('content')
        </div>
    </main>

    <footer class="bg-white/95 backdrop-blur-lg shadow-lg mt-12">
        <div class="max-w-7xl mx-auto px-4 py-6 text-center">
            <p class="text-slate-600 font-medium text-sm">
                &copy; {{ date('Y') }} Dashboard Penjualan. Built with Laravel & Chart.js
            </p>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>