<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="flex">

    <!-- Sidebar -->
    <div class="w-64 min-h-screen text-white bg-gray-800">
        <div class="p-4 text-xl font-bold">
            Admin Dashboard
        </div>

    </div>

    <!-- Main Content -->
    <div class="flex-1 p-8 bg-gray-100">
        @yield('content')
    </div>

</body>
</html>
