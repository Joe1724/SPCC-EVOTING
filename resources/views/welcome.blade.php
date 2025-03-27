<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPCC eVoting</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="p-4 bg-white shadow-md">
        <div class="container flex items-center justify-between mx-auto">
            <h1 class="text-2xl font-bold text-blue-600">SPCC eVoting</h1>
            <div>
                <a href="{{ route('login') }}" class="px-4 py-2 text-white bg-blue-500 rounded hover:bg-blue-600">Login</a>
                <a href="{{ route('register') }}" class="px-4 py-2 ml-2 text-blue-500 border border-blue-500 rounded hover:bg-blue-100">Register</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="flex items-center justify-center min-h-screen text-center">
        <div>
            <h2 class="mb-4 text-4xl font-bold text-gray-800">Your Voice, Your Vote!</h2>
            <p class="mb-6 text-lg text-gray-600">Participate in the SPCC eVoting system and make your vote count.</p>
            <a href="{{ route('login') }}" class="px-6 py-3 text-white bg-blue-600 rounded shadow hover:bg-blue-700">Get Started</a>
        </div>
    </section>

</body>
</html>
