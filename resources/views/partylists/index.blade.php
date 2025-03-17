<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partylists</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Partylists</h1>

        <a href="{{ route('partylists.create') }}" class="px-4 py-2 text-white bg-green-500 rounded">Add Partylist</a>

        <table class="w-full mt-4 bg-white border-collapse rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Name</th>
                    <th class="p-2 border">Election ID</th>
                    <th class="p-2 border">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($partylists as $partylist)
                <tr class="text-center">
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $partylist->name }}</td>
                    <td class="p-2 border">{{ $partylist->election_id }}</td>
                    <td class="p-2 border">
                        <a href="{{ route('partylists.edit', $partylist->id) }}" class="px-2 py-1 text-white bg-yellow-500 rounded">Edit</a>
                        <form action="{{ route('partylists.destroy', $partylist->id) }}" method="POST" class="inline">
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
