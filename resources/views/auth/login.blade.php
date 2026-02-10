<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login - SPCC eVoting</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

  <div class="flex min-h-screen">
    <!-- Left: Image section -->
    <div class="items-center justify-center hidden w-1/2 p-12 lg:flex gradient-blue">
      <div class="text-center animate-fadeIn">
        <img src="https://media-hosting.imagekit.io/05af90a6b4544822/image-removebg-preview%20(3).png?Expires=1841086841&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=gVYT42YB1jzZlTb1GHXXabUd4mVKuejme8pUCxy2DNuJaaMy4g07IcBgVH6Y4e9BXqrHNdCfdjiHp-SZIW-gE3AuRoswjpUQTBaxFQG1GFNQaTiRQ2q0TO21lrq-qw7Of1qsMb0kGRfufTN1ghrDQjcdCB3YZ0n4jBPz0APtwLsQd59hMLGuQoP3Dvfbnri5hO795f1EmpTbgQOuPNcvhaqIInNG1aEs9s4ZlBnXEp5080-XWDNGo8BUDZvglcFdXAnRBYMcLyGJWabcgF4eGBZicKS4VSZ9qAIKDZXtkIcIx1bayHvAZYJ3O-Nh~SkxpDv6fayUQAGZwUyFrRHRsg__" alt="SPCC eVoting" class="object-contain w-auto h-auto max-w-lg mx-auto drop-shadow-2xl" />
        <div class="mt-8 text-white">
          <h2 class="mb-3 text-3xl font-bold">Welcome Back!</h2>
          <p class="text-lg text-blue-100">Login to cast your vote and make a difference</p>
        </div>
      </div>
    </div>

    <!-- Right: Login form -->
    <div class="flex items-center justify-center w-full px-8 py-12 bg-white lg:w-1/2">
      <div class="w-full max-w-md animate-slideUp">
        <form action="/login" method="POST" class="p-8 space-y-6 bg-white shadow-soft-lg rounded-2xl">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          
          <!-- Logo -->
          <div class="flex justify-center mb-6">
            <img src="https://www.spcc.edu.ph/assets/img/background/spcc_campus.png" alt="SPCC Logo" class="h-20 transition-transform duration-300 hover:scale-105">
          </div>
          
          <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-800">Login to Your Account</h2>
            <p class="mt-2 text-sm text-gray-500">Enter your credentials to access the voting system</p>
          </div>

          <div class="space-y-5">
            <div>
              <label class="block mb-2 text-sm font-semibold text-gray-700">Student ID</label>
              <input type="text" name="student_id" placeholder="Enter your student ID" class="input" required />
            </div>

            <div>
              <label class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
              <input type="password" name="password" placeholder="Enter your password" class="input" required />
            </div>
          </div>

          <button type="submit" class="w-full btn btn-primary">
            Login to Vote
          </button>

          <p class="text-sm text-center text-gray-500">
            Don't have an account?
            <a href="/register" class="font-semibold text-blue-600 transition-colors hover:text-blue-700 hover:underline">Register here</a>
          </p>
        </form>

        <!-- Back to Home -->
        <div class="mt-6 text-center">
          <a href="/" class="text-sm text-gray-600 transition-colors hover:text-blue-600">
            ← Back to Home
          </a>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
