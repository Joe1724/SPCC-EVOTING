<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nominees</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Nominee Management</h1>

        <!-- Add Nominee Form -->
        <form action="{{ route('nominees.store') }}" method="POST" enctype="multipart/form-data" class="mb-6">
            @csrf
            <div class="grid grid-cols-2 gap-4">
                <input type="text" name="name" placeholder="Nominee Name" class="w-full p-2 border rounded" required>
                <input type="text" name="course" placeholder="Course" class="w-full p-2 border rounded" required>
                <input type="text" name="student_id" placeholder="Student ID" class="w-full p-2 border rounded" required>
                <input type="text" name="position_id" placeholder="Position ID" class="w-full p-2 border rounded" required>
                <input type="text" name="partylist_id" placeholder="Partylist ID" class="w-full p-2 border rounded" required>
                <input type="text" name="election_id" placeholder="Election ID" class="w-full p-2 border rounded" required>
                <input type="file" name="image" class="w-full p-2 border rounded">
                <textarea name="description" placeholder="Description" class="w-full p-2 border rounded"></textarea>
                <input type="text" name="motto" placeholder="Motto" class="w-full p-2 border rounded">
            </div>
            <button type="submit" class="px-4 py-2 mt-4 text-white bg-blue-500 rounded">Add Nominee</button>
        </form>

        <!-- Nominee Table -->
        <table class="w-full bg-white border-collapse rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Course</th>
                    <th class="p-2 border">Student ID</th>
                    <th class="p-2 border">Position</th>
                    <th class="p-2 border">Partylist</th>
                    <th class="p-2 border">Election</th>
                    <th class="p-2 border">Motto</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($nominees as $nominee)
                <tr class="text-center">
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $nominee->name }}</td>
                    <td class="p-2 border">{{ $nominee->course }}</td>
                    <td class="p-2 border">{{ $nominee->student_id }}</td>
                    <td class="p-2 border">{{ $nominee->position_id }}</td>
                    <td class="p-2 border">{{ $nominee->partylist_id }}</td>
                    <td class="p-2 border">{{ $nominee->election_id }}</td>
                    <td class="p-2 border">{{ $nominee->motto }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('nominees.edit', $nominee->id) }}" class="px-2 py-1 text-white bg-yellow-500 rounded">Edit</a>
                        <form action="{{ route('nominees.destroy', $nominee->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-2 py-1 text-white bg-red-500 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
