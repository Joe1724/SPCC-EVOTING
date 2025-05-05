<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navigation or Sidebar -->
    <nav class="p-4 bg-blue-600">
        <ul class="flex space-x-4 text-white">
            <li><a href="{{ route('voter.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('voter.nominees') }}">Nominees</a></li>
            <li><a href="{{ route('vote') }}">Vote</a></li>
        </ul>
    </nav>

    <!-- Main Content Area -->
    <div class="container px-4 py-6 mx-auto">
        @yield('content')
    </div>

</body>
</html>
