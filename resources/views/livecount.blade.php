<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Live Vote Count</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container px-4 py-8 mx-auto">
        <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">Live Vote Count</h1>

        @if($results->isEmpty())
            <p class="text-center text-gray-500">No vote data available yet.</p>
        @else
            @php
                $maxVotes = $results->max('count');
            @endphp

            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($results as $result)
                    @php
                        $nominee = $result->nominee;
                        $votePercentage = $maxVotes > 0 ? round(($result->count / $maxVotes) * 100) : 0;
                    @endphp

                    <div class="bg-white rounded-lg shadow-md overflow-hidden">
                        @if ($nominee->image)
                            <img src="{{ asset('storage/' . $nominee->image) }}" 
                                 alt="{{ $nominee->first_name }} {{ $nominee->last_name }}" 
                                 class="object-cover w-full h-48" />
                        @else
                            <div class="flex items-center justify-center w-full h-48 bg-gray-300">
                                <span class="text-gray-600">No Image</span>
                            </div>
                        @endif

                        <div class="p-4">
                            <h2 class="text-xl font-semibold text-gray-800">
                                {{ $nominee->first_name }} {{ $nominee->last_name }}
                            </h2>
                            <p class="text-sm text-gray-500">Position: {{ $nominee->position }}</p>
                            <p class="text-sm text-gray-500">Partylist: {{ $nominee->partylist }}</p>

                            <div class="mt-4">
                                <div class="flex justify-between mb-1 text-sm text-gray-700">
                                    <span>Votes: {{ $result->count }}</span>
                                    <span>{{ $votePercentage }}%</span>
                                </div>
                                <div class="w-full h-4 bg-gray-200 rounded-full">
                                    <div class="h-4 bg-blue-500 rounded-full" style="width: {{ $votePercentage }}%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

</body>
</html>
