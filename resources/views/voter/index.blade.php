<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Voter Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
</head>
<body class="flex min-h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 z-40 flex-col hidden w-64 p-6 transition-transform duration-300 bg-white shadow-soft-lg lg:flex">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('https://www.spcc.edu.ph/assets/img/background/spcc_campus.png') }}" alt="SPCC Logo" class="h-20 transition-transform duration-300 hover:scale-105">
        </div>

        <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Voter Panel</h2>

        <nav class="flex flex-col flex-1 space-y-2">
            <a href="{{ route('voter.dashboard') }}" class="nav-link {{ request()->routeIs('voter.dashboard') ? 'nav-link-active' : '' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('voter.nominees') }}" class="nav-link {{ request()->routeIs('voter.nominees') ? 'nav-link-active' : '' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                <span>Nominees</span>
            </a>
            <a href="{{ route('vote') }}" class="nav-link {{ request()->routeIs('vote') ? 'nav-link-active' : '' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <span>Vote</span>
            </a>
            <a href="{{ route('voter.results') }}" class="nav-link {{ request()->routeIs('voter.results') ? 'nav-link-active' : '' }}">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>
                <span>Results</span>
            </a>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?')" class="mt-auto">
                @csrf
                <button type="submit" class="w-full p-3 text-left text-red-600 transition-all duration-200 rounded-lg hover:bg-red-50 hover:pl-5 font-medium flex items-center gap-3">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/></svg>
                    <span>Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Mobile Navigation Button -->
    <div class="fixed z-50 lg:hidden top-4 left-4">
        <button onclick="toggleSidebar()" class="p-3 text-white transition-all duration-300 transform bg-blue-600 rounded-full shadow-lg hover:scale-110 hover:bg-blue-700">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
        </button>
    </div>

    <!-- Mobile Sidebar Overlay -->
    <div id="mobileSidebar" class="fixed inset-0 z-50 hidden bg-black bg-opacity-50 backdrop-blur-sm lg:hidden" onclick="toggleSidebar()">
        <aside class="flex flex-col w-64 h-full p-6 bg-white shadow-2xl animate-slideIn" onclick="event.stopPropagation()">
            <!-- Close Button -->
            <button onclick="toggleSidebar()" class="self-end mb-4 text-gray-500 hover:text-gray-700">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('https://www.spcc.edu.ph/assets/img/background/spcc_campus.png') }}" alt="SPCC Logo" class="h-20">
            </div>
            
            <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">Voter Panel</h2>
            
            <nav class="flex flex-col flex-1 space-y-2">
                <a href="{{ route('voter.dashboard') }}" class="nav-link">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/></svg>
                    <span>Dashboard</span>
                </a>
                <a href="{{ route('voter.nominees') }}" class="nav-link">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                    <span>Nominees</span>
                </a>
                <a href="{{ route('vote') }}" class="nav-link">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span>Vote</span>
                </a>
                <a href="{{ route('voter.results') }}" class="nav-link">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/></svg>
                    <span>Results</span>
                </a>
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?')" class="mt-auto">
                    @csrf
                    <button type="submit" class="w-full p-3 text-left text-red-600 transition-all duration-200 rounded-lg hover:bg-red-50 font-medium flex items-center gap-3">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/></svg>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>
    </div>

    <!-- Main Content -->
    <main class="flex-1 p-6 lg:ml-64 lg:p-8">
        @yield('content')
    </main>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>

</body>
</html>
