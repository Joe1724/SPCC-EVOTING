@extends('admin.dashboard')

@section('title', 'Manage Users')

@section('content')
    <h1 class="mb-8 text-3xl font-bold text-center">👩‍💻 User Management</h1>

    @if (session('success'))
        <div class="p-4 mb-6 text-green-700 bg-green-100 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Reset (Delete All Voters) Button -->
    <div class="flex justify-end mb-4">
        <form action="{{ route('admin.users.deleteVoters') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete all voters?');">
            @csrf
            @method('DELETE')
            <button type="submit"
                    class="px-4 py-2 mb-4 text-sm font-bold text-white bg-red-600 rounded hover:bg-red-700">
                🗑️ Reset (Delete All Voters)
            </button>
        </form>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full bg-white rounded shadow">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left">Name</th>
                    <th class="px-6 py-3 text-left">Student ID</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Role</th>
                    <th class="px-6 py-3 text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $user->name }}</td>
                        <td class="px-6 py-4">{{ $user->student_id }}</td>
                        <td class="px-6 py-4">{{ $user->email }}</td>
                        <td class="px-6 py-4 capitalize">{{ $user->role }}</td>
                        <td class="px-6 py-4 space-x-2 text-center">
                            <a href="{{ route('admin.users.edit', $user->id) }}"
                               class="px-4 py-2 text-sm text-white bg-blue-500 rounded hover:bg-blue-600">
                                Edit
                            </a>

                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST"
                                  class="inline-block" onsubmit="return confirm('Are you sure?');">
                                @csrf
                                @method('DELETE')
                                <button class="px-4 py-2 text-sm text-white bg-red-500 rounded hover:bg-red-600">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
