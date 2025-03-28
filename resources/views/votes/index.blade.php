<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">
    <div class="max-w-5xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Voting Page</h1>

        @if(session('error'))
            <p class="p-3 mb-4 text-red-700 bg-red-200">{{ session('error') }}</p>
        @endif

        <table class="w-full bg-white border-collapse rounded shadow-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="p-2 border">Nominee</th>
                    <th class="p-2 border">Votes</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($votes as $vote)
                <tr class="text-center">
                    <td class="p-2 border">{{ $vote->nominee->first_name }} {{ $vote->nominee->last_name }}</td>
                    <td class="p-2 border">{{ $vote->count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
