<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <form method="POST" action="{{ route('register') }}" class="p-6 bg-white rounded-md shadow-md">
        @csrf
        <h2 class="mb-4 text-2xl font-bold">Register</h2>

        <input type="text" name="name" placeholder="Full Name" required class="w-full p-2 mb-3 border rounded">
        <input type="email" name="email" placeholder="Email" required class="w-full p-2 mb-3 border rounded">
        <input type="password" name="password" placeholder="Password" required class="w-full p-2 mb-3 border rounded">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" required class="w-full p-2 mb-3 border rounded">

        <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded">Register</button>
    </form>
</body>
</html>
