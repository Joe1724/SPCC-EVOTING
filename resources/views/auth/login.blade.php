<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

  <div class="flex min-h-screen">
    <!-- Left: Image section -->
    <div class="items-center justify-center hidden w-1/2 bg-blue-600 lg:flex">
     <img src="https://media-hosting.imagekit.io/05af90a6b4544822/image-removebg-preview%20(3).png?Expires=1841086841&Key-Pair-Id=K2ZIVPTIP2VGHC&Signature=gVYT42YB1jzZlTb1GHXXabUd4mVKuejme8pUCxy2DNuJaaMy4g07IcBgVH6Y4e9BXqrHNdCfdjiHp-SZIW-gE3AuRoswjpUQTBaxFQG1GFNQaTiRQ2q0TO21lrq-qw7Of1qsMb0kGRfufTN1ghrDQjcdCB3YZ0n4jBPz0APtwLsQd59hMLGuQoP3Dvfbnri5hO795f1EmpTbgQOuPNcvhaqIInNG1aEs9s4ZlBnXEp5080-XWDNGo8BUDZvglcFdXAnRBYMcLyGJWabcgF4eGBZicKS4VSZ9qAIKDZXtkIcIx1bayHvAZYJ3O-Nh~SkxpDv6fayUQAGZwUyFrRHRsg__" alt="" class="object-cover w-auto h-auto" />
    </div>

    <!-- Right: Login form -->
    <div class="flex items-center justify-center w-full px-8 py-12 bg-white lg:w-1/2">
      <form action="/login" method="POST" class="w-full max-w-md p-8 space-y-6 bg-white shadow-lg rounded-xl">
        <!-- Simulate @csrf -->
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <img src="https://www.spcc.edu.ph/assets/img/background/spcc_campus.png" alt="">
        <h2 class="text-3xl font-bold text-center text-blue-700">Login to Your Account</h2>

        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Student ID</label>
          <input type="text" name="student_id" placeholder="Enter your student ID"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <div>
          <label class="block mb-1 text-sm font-semibold text-gray-700">Password</label>
          <input type="password" name="password" placeholder="Enter your password"
            class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>

        <button type="submit"
          class="w-full py-2 font-semibold text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700">
          Login
        </button>

        <p class="text-sm text-center text-gray-500">
          Don't have an account?
          <a href="/register" class="text-blue-600 hover:underline">Register here</a>
        </p>
      </form>
    </div>
  </div>

</body>
</html>
