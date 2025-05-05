<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Voting Results</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-screen p-8 bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100">

    <h1 class="mb-10 text-4xl font-extrabold text-center text-gray-800">🏆 Voting Results 🏆</h1>

    <div class="grid grid-cols-1 gap-8 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($winners as $position => $winnerGroup)
            @foreach ($winnerGroup as $winner)
                <div class="p-6 transition-all duration-300 bg-white shadow-lg rounded-2xl hover:shadow-2xl">
                    <div class="flex flex-col items-center space-y-4">

                        @if ($winner->nominee->image)
                            <img src="{{ asset('storage/' . $winner->nominee->image) }}"
                                 alt="Nominee Image"
                                 class="object-cover w-32 h-32 border-4 border-blue-300 rounded-full shadow-md">
                        @else
                            <div class="flex items-center justify-center w-32 h-32 bg-gray-300 rounded-full">
                                <span class="text-gray-500">No Photo</span>
                            </div>
                        @endif

                        <h2 class="text-2xl font-bold text-center text-gray-700">{{ $winner->nominee->first_name }} {{ $winner->nominee->last_name }}</h2>

                        <div class="px-4 py-1 text-sm font-medium text-white bg-blue-500 rounded-full">
                            {{ $winner->nominee->partylist }}
                        </div>

                        <div class="px-4 py-1 text-sm font-semibold text-gray-600 bg-gray-100 rounded-full">
                            {{ $position }}
                        </div>

                        <div class="flex items-center justify-center mt-4">
                            <span class="px-4 py-2 text-lg font-bold text-white bg-green-500 rounded-full shadow-md">
                                🗳️ {{ $winner->count }} Votes
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>

</body>
</html>
