<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Results</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Vote Results</h1>

        <a href="{{ route('votes.create') }}" class="px-4 py-2 text-white bg-green-500 rounded">Vote Now</a>

        <table class="w-full mt-4 bg-white border-collapse rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">#</th>
                    <th class="p-2 border">Nominee</th>
                    <th class="p-2 border">Election</th>
                    <th class="p-2 border">Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($votes as $vote)
                <tr class="text-center">
                    <td class="p-2 border">{{ $loop->iteration }}</td>
                    <td class="p-2 border">{{ $vote->nominee->name }}</td>
                    <td class="p-2 border">{{ $vote->election->name }}</td>
                    <td class="p-2 font-bold border">{{ $vote->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
