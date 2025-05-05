<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voter Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <div class="flex flex-col hidden w-64 p-6 bg-white shadow-lg lg:block">

        <nav class="flex flex-col space-y-4">

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-left text-gray-700 hover:text-red-600">🚪 Logout</button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-10 lg:ml-64">
        <h1 class="mb-4 text-3xl font-bold">Welcome, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600"> use the sidebar to vote or view nominees.</p>

        <!-- Dynamic Content -->
        @yield('content') <!-- This is where your vote page or nominees page will be loaded -->
    </div>

    <!-- Mobile Navigation Button -->
    <div class="absolute lg:hidden top-4 left-4">
        <button onclick="toggleSidebar()" class="p-2 text-white bg-blue-600 rounded-full">
            &#9776; <!-- Hamburger Icon -->
        </button>
    </div>

    <!-- Mobile Sidebar (Hidden by Default) -->
    <div id="mobileSidebar" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 lg:hidden">
        <div class="flex flex-col w-64 p-6 bg-white shadow-lg">
            <h2 class="mb-8 text-2xl font-bold">Voter Panel</h2>
            <nav class="flex flex-col space-y-4">
                <a href="{{ url('/vote') }}" class="text-gray-700 hover:text-blue-600">🗳️ Vote</a>
                <a href="{{ url('/nominees') }}" class="text-gray-700 hover:text-blue-600">👥 Nominees</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-left text-gray-700 hover:text-red-600">🚪 Logout</button>
                </form>
            </nav>
        </div>
    </div>

    <script>
        // Toggle mobile sidebar visibility
        function toggleSidebar() {
            const sidebar = document.getElementById('mobileSidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>

</body>
</html>
