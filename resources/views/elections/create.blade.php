<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Election</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Add Election</h1>

        <form action="{{ route('elections.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Election Name" class="w-full p-2 mb-4 border rounded" required>

            <label class="block font-bold">Status</label>
            <select name="status" class="w-full p-2 mb-4 border rounded">
                <option value="Upcoming">Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
            </select>

            <label class="block font-bold">Start Date</label>
            <input type="datetime-local" name="start" class="w-full p-2 mb-4 border rounded" required>

            <label class="block font-bold">End Date</label>
            <input type="datetime-local" name="end" class="w-full p-2 mb-4 border rounded" required>

            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Save</button>
            <a href="{{ route('elections.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Back</a>
        </form>

    </div>

</body>
</html>
