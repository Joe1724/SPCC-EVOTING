<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <form method="POST" action="{{ route('login') }}" class="p-6 bg-white rounded-md shadow-md">
        @csrf
        <h2 class="mb-4 text-2xl font-bold">Login</h2>

        @if(session('error'))
            <p class="mb-2 text-red-500">{{ session('error') }}</p>
        @endif

        <input type="email" name="email" placeholder="Email" required class="w-full p-2 mb-3 border rounded">
        <input type="password" name="password" placeholder="Password" required class="w-full p-2 mb-3 border rounded">

        <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded">Login</button>

        <p class="mt-2 text-sm">No account? <a href="{{ route('register') }}" class="text-blue-500">Register</a></p>
    </form>
</body>
</html>
