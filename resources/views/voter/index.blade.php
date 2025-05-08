<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Voter Dashboard')</title>

    <!-- Tailwind via CDN (for development) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CDN (for modal, dropdown, etc.) -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <script>
        // Open modal using Flowbite modal
        function openModal(description) {
            const modal = new window.Flowbite.Modal(document.getElementById('modal'));
            modal.show();
            document.getElementById('modal-description').innerText = description;
        }

        // Close modal using Flowbite modal
        function closeModal() {
            const modal = new window.Flowbite.Modal(document.getElementById('modal'));
            modal.hide();
        }
    </script>
</head>
<body class="flex min-h-screen bg-gray-100">

    <!-- Sidebar -->
    <div class="flex flex-col w-64 p-6 bg-white shadow-lg lg:block">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <img src="{{ asset('https://www.spcc.edu.ph/assets/img/background/spcc_campus.png') }}" alt="Logo" class="w-32 h-auto">
        </div>

        <h2 class="mb-6 text-2xl font-bold text-gray-800">Voter Panel</h2>

        <nav class="flex flex-col space-y-4">
            <a href="{{ route('voter.dashboard') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">🏠 Dashboard</a>
            <a href="{{ route('voter.nominees') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">👥 Nominees</a>
            <a href="{{ route('vote') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">🗳️ Vote</a>
            <a href="{{ route('voter.results') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">📊 Results</a>

            <!-- Logout Button with confirmation -->
            <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?')">
                @csrf
                <button type="submit" class="p-3 text-left text-gray-700 transition-colors rounded-lg hover:bg-red-600 hover:text-white">🚪 Logout</button>
            </form>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 ">
        <!-- Dynamic Content -->
        @yield('content') <!-- This is where your vote page or nominees page will be loaded -->
    </div>

    <!-- Mobile Navigation Button -->
    <div class="absolute lg:hidden top-4 left-4">
        <button onclick="toggleSidebar()" class="p-3 text-white bg-blue-600 rounded-full shadow-md">
            &#9776; <!-- Hamburger Icon -->
        </button>
    </div>

    <!-- Mobile Sidebar (Hidden by Default) -->
    <div id="mobileSidebar" class="fixed inset-0 z-50 hidden bg-gray-800 bg-opacity-50 lg:hidden">
        <div class="flex flex-col w-64 p-6 bg-white shadow-lg">
            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('path/to/your/logo.png') }}" alt="Logo" class="w-32 h-auto">
            </div>
            <h2 class="mb-8 text-2xl font-bold text-gray-800">Voter Panel</h2>
            <nav class="flex flex-col space-y-4">
                <a href="{{ route('voter.dashboard') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">🏠 Dashboard</a>
                <a href="{{ route('voter.nominees') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">👥 Nominees</a>
                <a href="{{ route('vote') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">🗳️ Vote</a>
                <a href="{{ route('voter.results') }}" class="p-3 text-gray-700 transition-colors rounded-lg hover:bg-blue-600 hover:text-white">📊 Results</a>
                <form method="POST" action="{{ route('logout') }}" onsubmit="return confirm('Are you sure you want to logout?')">
                    @csrf
                    <button type="submit" class="p-3 text-left text-gray-700 transition-colors rounded-lg hover:bg-red-600 hover:text-white">🚪 Logout</button>
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

    <!-- Flowbite Modal Component (Hidden by Default) -->
    <div id="modal" tabindex="-1" aria-hidden="true" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="bg-white rounded-lg shadow-lg w-96">
            <div class="p-4">
                <button type="button" class="text-gray-700" onclick="closeModal()">&times;</button>
                <h2 class="mb-4 text-lg font-semibold text-center">Nominee Description</h2>
                <p id="modal-description" class="text-gray-600"></p>
            </div>
        </div>
    </div>

</body>
</html>
