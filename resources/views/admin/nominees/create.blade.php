@extends('admin.dashboard')

@section('title', 'Add Nominee')

@section('content')
    <h1 class="mb-6 text-3xl font-bold">Add Nominee</h1>

    {{-- Validation Error Messages --}}
    @if ($errors->any())
        <div class="p-4 mb-6 text-red-700 bg-red-100 border border-red-300 rounded">
            <ul class="pl-5 list-disc">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.nominees.store') }}" method="POST" enctype="multipart/form-data" class="max-w-md p-6 bg-white rounded shadow">
        @csrf

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">First Name</label>
            <input type="text" name="first_name" value="{{ old('first_name') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Last Name</label>
            <input type="text" name="last_name" value="{{ old('last_name') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Course</label>
            <input type="text" name="course" value="{{ old('course') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Position</label>
            <input type="text" name="position" value="{{ old('position') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Partylist</label>
            <input type="text" name="partylist" value="{{ old('partylist') }}" class="w-full p-2 border rounded" required>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Description</label>
            <textarea name="description" class="w-full p-2 border rounded" required>{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block mb-2 text-sm font-bold">Image</label>
            <input type="file" name="image" class="w-full p-2 border rounded" required>
        </div>

        <button type="submit" class="w-full px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">Save</button>
    </form>
@endsection
