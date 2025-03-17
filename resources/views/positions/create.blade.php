<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Position</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Add Position</h1>

        <form action="{{ route('positions.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Position Name" class="w-full p-2 mb-4 border rounded" required>
            <input type="text" name="election_id" placeholder="Election ID" class="w-full p-2 mb-4 border rounded" required>
            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Save</button>
            <a href="{{ route('positions.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Back</a>
        </form>
    </div>

</body>
</html>
