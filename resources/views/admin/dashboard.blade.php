<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind via CDN (for development) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Flowbite CDN (for modal, dropdown, etc.) -->
    <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>

    <script>
        function openModal(description) {
            document.getElementById('modal').classList.remove('hidden');
            document.getElementById('modal-description').innerText = description;
        }

        function closeModal() {
            document.getElementById('modal').classList.add('hidden');
        }
    </script>
</head>
<body class="flex min-h-screen bg-gray-100">


    <!-- Sidebar -->
    <aside class="w-64 min-h-screen bg-white border-r shadow-md">


        <div class="flex justify-center mb-8">
            <img src="{{ asset('https://www.spcc.edu.ph/assets/img/background/spcc_campus.png') }}" alt="Logo" class="w-32 h-auto">
        </div>
        <div class="p-6 text-2xl font-bold text-gray-800">
            Admin Dashboard
        </div>


        <ul class="p-4 space-y-2 font-medium">
            <li>
                <a href="/admin/dashboard" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 20V12h4v8h5V10h3L10 0 0 10h3v10z"/></svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="/settings" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M4 10a6 6 0 1012 0A6 6 0 004 10z"/></svg>
                    Settings
                </a>
            </li>
            <li>
                <a href="/admin/users" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 3a3 3 0 100 6 3 3 0 000-6zM2 17a6 6 0 0112 0H2z"/></svg>
                    Users
                </a>
            </li>
            <li>
                <a href="/nominees" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M6 6a4 4 0 118 0 4 4 0 01-8 0zm8 6H6a4 4 0 00-4 4v2h16v-2a4 4 0 00-4-4z"/></svg>
                    Nominee
                </a>
            </li>
            <li>
                <a href="/admin/information" class="flex items-center p-2 text-gray-700 rounded-lg hover:bg-gray-200">
                    <svg class="w-5 h-5 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a8 8 0 100 16 8 8 0 000-16zm.75 12.5h-1.5v-6h1.5v6zM10 6a.75.75 0 110-1.5A.75.75 0 0110 6z"/></svg>
                    Information
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex items-center p-2 text-red-600 rounded-lg hover:bg-red-100">
                        <svg class="w-5 h-5 mr-2 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M3 10a1 1 0 011-1h10v2H4a1 1 0 01-1-1zM14 3v2h3v10h-3v2h5V3h-5z"/>
                        </svg>
                        Logout
                    </button>
                </form>

            </li>
        </ul>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        @yield('content')

    </main>

</body>
</html>
