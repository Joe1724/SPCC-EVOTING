<!DOCTYPE html>
<html lang="en" class="smooth-scroll">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPCC eVoting System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            background-image: url('https://www.toptal.com/designers/subtlepatterns/patterns/symphony.png');
            background-repeat: repeat;
            background-size: contain;
        }
    </style>
</head>
<body class="flex flex-col min-h-screen">

    <!-- Navbar -->
    <nav class="sticky top-0 z-50 w-full bg-white/95 backdrop-blur-md shadow-soft animate-fadeIn">
        <div class="container flex items-center justify-between px-6 py-4 mx-auto">
            <!-- Logos -->
            <div class="flex items-center gap-4">
                <img src="https://evaluation.spcc.edu.ph/assets/img/logo.png" alt="SPCC Logo" class="object-cover w-14 h-14 transition-transform duration-300 hover:scale-110">
                <img src="https://spcc.edu.ph/assets/img/departments/CIT.jpg" alt="CIT Logo" class="object-cover w-14 h-14 transition-transform duration-300 hover:scale-110">
                <div class="hidden ml-2 md:block">
                    <h2 class="text-lg font-bold text-gray-800">SPCC eVoting</h2>
                    <p class="text-xs text-gray-500">College of Information Technology</p>
                </div>
            </div>

            <!-- Links -->
            <div class="flex items-center gap-3">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-secondary">
                    Register
                </a>
                <a href="{{ route('livecount') }}" class="hidden px-5 py-2.5 text-green-600 transition-all duration-300 bg-white border-2 border-green-600 rounded-lg hover:bg-green-50 focus:ring-4 focus:ring-green-300 font-semibold sm:inline-flex items-center gap-2">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                    </svg>
                    Live Count
                </a>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center flex-grow px-4 text-center animate-slideUp">
        <div class="max-w-4xl mx-auto">
            <!-- Hero Badge -->
            <div class="inline-flex items-center gap-2 px-4 py-2 mb-6 bg-blue-100 rounded-full animate-pulse-slow">
                <span class="w-2 h-2 bg-blue-600 rounded-full animate-pulse"></span>
                <span class="text-sm font-semibold text-blue-800">Secure & Transparent Voting</span>
            </div>

            <!-- Hero Title -->
            <h1 class="mb-6 text-6xl font-extrabold leading-tight text-gray-900 md:text-7xl">
                Your Voice, <br> 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-blue-800">Your Vote!</span>
            </h1>
            
            <!-- Hero Description -->
            <p class="max-w-2xl mx-auto mb-10 text-xl text-gray-600">
                Participate in the SPCC eVoting System and make your vote count. 
                <span class="font-semibold text-blue-600">Secure, fast, and transparent</span> voting for everyone.
            </p>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col items-center justify-center gap-4 sm:flex-row">
                <a href="{{ route('login') }}" class="px-8 py-4 text-lg font-semibold text-white transition-all duration-300 transform bg-blue-600 rounded-xl hover:bg-blue-700 hover:scale-105 shadow-lg hover:shadow-2xl focus:ring-4 focus:ring-blue-300">
                    Get Started →
                </a>
                <a href="{{ route('livecount') }}" class="px-8 py-4 text-lg font-semibold text-blue-600 transition-all duration-300 transform bg-white border-2 border-blue-600 rounded-xl hover:bg-blue-50 hover:scale-105 shadow-lg hover:shadow-2xl focus:ring-4 focus:ring-blue-300">
                    View Live Results
                </a>
            </div>

            <!-- Features -->
            <div class="grid grid-cols-1 gap-6 mt-16 md:grid-cols-3">
                <div class="p-6 transition-all duration-300 bg-white shadow-soft rounded-xl hover:shadow-soft-lg card-hover">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-800">Secure Voting</h3>
                    <p class="text-sm text-gray-600">Your vote is encrypted and protected with industry-standard security</p>
                </div>
                <div class="p-6 transition-all duration-300 bg-white shadow-soft rounded-xl hover:shadow-soft-lg card-hover">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.3 1.046A1 1 0 0112 2v5h4a1 1 0 01.82 1.573l-7 10A1 1 0 018 18v-5H4a1 1 0 01-.82-1.573l7-10a1 1 0 011.12-.38z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-800">Fast & Easy</h3>
                    <p class="text-sm text-gray-600">Cast your vote in seconds with our intuitive interface</p>
                </div>
                <div class="p-6 transition-all duration-300 bg-white shadow-soft rounded-xl hover:shadow-soft-lg card-hover">
                    <div class="flex items-center justify-center w-12 h-12 mx-auto mb-4 bg-blue-100 rounded-full">
                        <svg class="w-6 h-6 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-lg font-bold text-gray-800">Live Results</h3>
                    <p class="text-sm text-gray-600">Track voting results in real-time with live updates</p>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="py-6 mt-12 text-center bg-white/80 backdrop-blur-sm">
        <p class="text-sm text-gray-600">© 2025 SPCC eVoting System. All rights reserved.</p>
    </footer>

</body>
</html>
