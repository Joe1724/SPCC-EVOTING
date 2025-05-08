<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting System</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <nav class="flex items-center justify-between w-full p-4 bg-white shadow">
        <!-- Logos -->
        <div class="flex items-center space-x-4">
            <img src="https://evaluation.spcc.edu.ph/assets/img/logo.png" alt="Logo 1" class="object-cover w-12 h-12">
            <img src="https://spcc.edu.ph/assets/img/departments/CIT.jpg" alt="Logo 2" class="object-cover w-12 h-12">
        </div>

        <!-- Links -->
        <div class="space-x-4">
            <a href="/login" class="px-4 py-2 text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
                Login
            </a>
            <a href="/register" class="px-4 py-2 text-blue-500 transition bg-white border border-blue-500 rounded-lg hover:bg-blue-50">
                Register
            </a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex flex-col items-center justify-center flex-grow px-4 text-center">
        <h1 class="mb-4 text-5xl font-extrabold text-gray-900 drop-shadow-md">
            Your Voice, <br> Your Vote!
        </h1>
        <p class="mb-8 text-gray-600">
            Participate in the SPCC eVoting System and make your vote count!
        </p>
        <a href="/login" class="px-6 py-3 text-lg text-white transition bg-blue-500 rounded-lg hover:bg-blue-600">
            Get Started
        </a>
    </main>

</body>
</html>
