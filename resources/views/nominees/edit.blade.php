<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Nominee</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-2xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Edit Nominee</h1>

        <form action="{{ route('nominees.update', $nominee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block font-bold">First Name:</label>
                <input type="text" name="first_name" value="{{ $nominee->first_name }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Last Name:</label>
                <input type="text" name="last_name" value="{{ $nominee->last_name }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Course:</label>
                <input type="text" name="course" value="{{ $nominee->course }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Position:</label>
                <input type="text" name="position" value="{{ $nominee->position }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Partylist:</label>
                <input type="text" name="partylist" value="{{ $nominee->partylist }}" required class="w-full p-2 border rounded">
            </div>

            <div class="mb-4">
                <label class="block font-bold">Description:</label>
                <textarea name="description" required class="w-full p-2 border rounded">{{ $nominee->description }}</textarea>
            </div>

            <div class="mb-4">
                <label class="block font-bold">Image:</label>
                <input type="file" name="image" class="w-full p-2 border rounded">
                <p>Current Image:</p>
                <img src="{{ asset('storage/' . $nominee->image) }}" class="w-32 mt-2 rounded">
            </div>

            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Update</button>
            <a href="{{ route('nominees.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Cancel</a>
        </form>
    </div>
</body>
</html>
