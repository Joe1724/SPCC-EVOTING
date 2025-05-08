@extends('admin.dashboard')

@section('title', 'Edit User')

@section('content')
    <h1 class="mb-8 text-3xl font-bold text-center">✏️ Edit User</h1>

    @if ($errors->any())
        <div class="p-4 mb-6 text-red-700 bg-red-100 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Name</label>
            <input type="text" name="name" value="{{ $user->name }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Student ID</label>
            <input type="text" name="student_id" value="{{ $user->student_id }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-4">
            <label class="block mb-2 font-semibold">Email</label>
            <input type="email" name="email" value="{{ $user->email }}" class="w-full p-2 border rounded">
        </div>

        <div class="mb-6">
            <label class="block mb-2 font-semibold">Role</label>
            <select name="role" class="w-full p-2 border rounded">
                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="voter" {{ $user->role == 'voter' ? 'selected' : '' }}>Voter</option>
            </select>
        </div>

        <div class="flex justify-between">
            <a href="{{ route('admin.users.index') }}" class="px-4 py-2 text-white bg-gray-400 rounded hover:bg-gray-500">Cancel</a>
            <button type="submit" class="px-6 py-2 text-white bg-green-500 rounded hover:bg-green-600">Update</button>
        </div>

    </form>
@endsection
