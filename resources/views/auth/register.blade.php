<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register - SPCC eVoting</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

  <div class="flex min-h-screen">
    <!-- Left: Image section -->
    <div class="items-center justify-center hidden w-1/2 p-12 lg:flex gradient-blue">
      <div class="text-center animate-fadeIn">
        <img src="https://source.unsplash.com/800x800/?college,students" alt="Register" class="object-cover w-full h-full max-w-lg mx-auto rounded-3xl shadow-2xl" />
        <div class="mt-8 text-white">
          <h2 class="mb-3 text-3xl font-bold">Join Us Today!</h2>
          <p class="text-lg text-blue-100">Create your account and participate in democratic voting</p>
        </div>
      </div>
    </div>

    <!-- Right: Register form -->
    <div class="flex items-center justify-center w-full px-8 py-12 overflow-y-auto bg-white lg:w-1/2">
      <div class="w-full max-w-md animate-slideUp">
        <form action="/register" method="POST" class="p-8 space-y-5 bg-white shadow-soft-lg rounded-2xl">
          @csrf
          
          <!-- Logo -->
          <div class="flex justify-center mb-4">
            <img src="https://www.spcc.edu.ph/assets/img/background/spcc_campus.png" alt="SPCC Logo" class="h-16 transition-transform duration-300 hover:scale-105">
          </div>
          
          <div class="text-center">
            <h2 class="text-3xl font-bold text-gray-800">Create Your Account</h2>
            <p class="mt-2 text-sm text-gray-500">Fill in your details to get started</p>
          </div>

          <!-- Name -->
          <div>
            <label class="block mb-2 text-sm font-semibold text-gray-700">Full Name</label>
            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your full name"
                   class="input @error('name') input-error @enderror" required />
            @error('name')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Student ID -->
          <div>
            <label class="block mb-2 text-sm font-semibold text-gray-700">Student ID</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" placeholder="Enter your student ID"
                   class="input @error('student_id') input-error @enderror" required />
            @error('student_id')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Email -->
          <div>
            <label class="block mb-2 text-sm font-semibold text-gray-700">Email</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Enter your email"
                   class="input @error('email') input-error @enderror" required />
            @error('email')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Password -->
          <div>
            <label class="block mb-2 text-sm font-semibold text-gray-700">Password</label>
            <input type="password" name="password" placeholder="Create a strong password"
                   class="input @error('password') input-error @enderror" required />
            @error('password')
              <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
            @enderror
          </div>

          <!-- Confirm Password -->
          <div>
            <label class="block mb-2 text-sm font-semibold text-gray-700">Confirm Password</label>
            <input type="password" name="password_confirmation" placeholder="Confirm your password"
                   class="input" required />
          </div>

          <!-- Submit -->
          <button type="submit" class="w-full btn btn-primary">
            Create Account
          </button>

          <p class="text-sm text-center text-gray-500">
            Already have an account?
            <a href="/login" class="font-semibold text-blue-600 transition-colors hover:text-blue-700 hover:underline">Login here</a>
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
