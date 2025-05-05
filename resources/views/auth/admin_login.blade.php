<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">

    <form method="POST" action="{{ route('admin.login') }}" class="p-6 bg-white rounded shadow-md w-80">
        @csrf
        <h2 class="mb-4 text-2xl font-bold text-center">Admin Login</h2>

        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border-gray-300 rounded" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Password</label>
            <input type="password" name="password" class="w-full p-2 border-gray-300 rounded" required>
        </div>

        <button type="submit" class="w-full p-2 text-white bg-blue-500 rounded hover:bg-blue-600">
            Login
        </button>
    </form>

</body>
</html>
