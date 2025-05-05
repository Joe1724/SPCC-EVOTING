<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <!-- Left: Image section -->
    <div class="items-center justify-center hidden w-1/2 bg-yellow-600 lg:flex">
      <img src="https://source.unsplash.com/800x800/?college,students" alt="Register" class="object-cover w-full h-full" />
    </div>

    <!-- Right: Register form -->
    <div class="flex items-center justify-center w-full px-8 py-12 bg-white lg:w-1/2">
      <form action="/register" method="POST" class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img src="https://www.spcc.edu.ph/assets/img/background/spcc_campus.png" alt="">
        <h2 class="text-3xl font-bold text-center text-yellow-700">Register Your Account</h2>

        <!-- Name -->
        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Full Name</label>
          <input type="text" name="name" placeholder="Your full name"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required />
        </div>

        <!-- Student ID -->
        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Student ID</label>
          <input type="text" name="student_id" placeholder="Enter your student ID"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required />
        </div>

        <div>
            <label class="block mb-1 text-sm font-semibold text-gray-700">Email</label>
            <input type="email" name="email" placeholder="Enter your student Email"
              class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required />
          </div>

        <!-- Password -->
        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
          <input type="password" name="password" placeholder="Create a password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required />
        </div>

        <!-- Confirm Password -->
        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Confirm Password</label>
          <input type="password" name="password_confirmation" placeholder="Confirm your password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-500" required />
        </div>

        <!-- Submit -->
        <button type="submit"
          class="w-full py-2 font-semibold text-white transition duration-300 bg-yellow-600 rounded-lg hover:bg-yellow-700">
          Register
        </button>

        <p class="text-sm text-center text-gray-500">
          Already have an account?
          <a href="/login" class="text-yellow-600 hover:underline">Login here</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
