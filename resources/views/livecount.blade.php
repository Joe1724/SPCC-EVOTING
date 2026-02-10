<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Live Vote Count - SPCC eVoting</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="sticky top-0 z-50 bg-white shadow-soft backdrop-blur-md bg-white/95">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-4">
                    <img src="https://evaluation.spcc.edu.ph/assets/img/logo.png" alt="SPCC Logo" class="object-cover w-12 h-12">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Live Vote Count</h1>
                        <p class="text-sm text-gray-500">Real-time voting results</p>
                    </div>
                </div>
                <a href="/" class="btn btn-secondary">
                    ← Back to Home
                </a>
            </div>
        </div>
    </header>

    <div class="container px-4 py-8 mx-auto">
        <!-- Live Indicator -->
        <div class="flex items-center justify-center gap-3 mb-8 animate-fadeIn">
            <div class="relative flex items-center gap-2 px-6 py-3 bg-white shadow-soft rounded-xl">
                <span class="relative flex w-3 h-3">
                    <span class="absolute inline-flex w-full h-full bg-red-400 rounded-full opacity-75 animate-ping"></span>
                    <span class="relative inline-flex w-3 h-3 bg-red-500 rounded-full"></span>
                </span>
                <span class="text-lg font-bold text-gray-800">LIVE</span>
            </div>
        </div>

        @if($results->isEmpty())
            <div class="max-w-md p-12 mx-auto text-center bg-white shadow-soft rounded-2xl animate-slideUp">
                <div class="flex items-center justify-center w-20 h-20 mx-auto mb-4 bg-gray-100 rounded-full">
                    <svg class="w-10 h-10 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 4a1 1 0 011-1h2a1 1 0 011 1v12a1 1 0 01-1 1h-2a1 1 0 01-1-1V4z"/>
                    </svg>
                </div>
                <h3 class="mb-2 text-xl font-bold text-gray-800">No Votes Yet</h3>
                <p class="text-gray-500">Vote data will appear here once voting begins.</p>
            </div>
        @else
            @php
                $maxVotes = $results->max('count');
                $groupedResults = $results->groupBy(function($result) {
                    return $result->nominee->position;
                });
            @endphp

            <div class="space-y-12">
                @foreach($groupedResults as $position => $positionResults)
                    <div class="animate-slideUp">
                        <div class="mb-6">
                            <h2 class="text-3xl font-bold text-gray-800">{{ $position }}</h2>
                            <div class="w-20 h-1 mt-2 bg-blue-600 rounded-full"></div>
                        </div>

                        <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($positionResults->sortByDesc('count') as $index => $result)
                                @php
                                    $nominee = $result->nominee;
                                    $votePercentage = $maxVotes > 0 ? round(($result->count / $maxVotes) * 100) : 0;
                                    $isLeading = $index === 0;
                                @endphp

                                <div class="overflow-hidden transition-all duration-300 bg-white card shadow-soft rounded-2xl card-hover {{ $isLeading ? 'ring-2 ring-blue-500' : '' }}">
                                    @if($isLeading)
                                        <div class="flex items-center justify-center gap-2 px-4 py-2 text-sm font-bold text-center text-white bg-blue-600">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                            </svg>
                                            Leading
                                        </div>
                                    @endif

                                    @if ($nominee->image)
                                        <div class="relative overflow-hidden h-52">
                                            <img src="{{ asset('storage/' . $nominee->image) }}" 
                                                 alt="{{ $nominee->first_name }} {{ $nominee->last_name }}" 
                                                 class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110" />
                                            <div class="absolute inset-0 gradient-overlay"></div>
                                        </div>
                                    @else
                                        <div class="flex items-center justify-center h-52 bg-gradient-to-br from-gray-200 to-gray-300">
                                            <svg class="w-16 h-16 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    @endif

                                    <div class="p-6">
                                        <h3 class="mb-1 text-xl font-bold text-gray-800">
                                            {{ $nominee->first_name }} {{ $nominee->last_name }}
                                        </h3>
                                        <div class="flex items-center gap-2 mb-4">
                                            <span class="badge badge-blue">{{ $nominee->partylist }}</span>
                                        </div>

                                        <div class="p-4 mb-4 bg-gray-50 rounded-xl">
                                            <div class="flex items-center justify-between mb-2">
                                                <span class="text-sm font-semibold text-gray-600">Total Votes</span>
                                                <span class="text-2xl font-bold text-blue-600">{{ $result->count }}</span>
                                            </div>
                                            <div class="w-full h-3 overflow-hidden bg-gray-200 rounded-full">
                                                <div class="h-3 transition-all duration-1000 ease-out bg-gradient-to-r from-blue-500 to-blue-600 rounded-full" 
                                                     style="width: {{ $votePercentage }}%"></div>
                                            </div>
                                            <div class="mt-1 text-right">
                                                <span class="text-sm font-bold text-gray-700">{{ $votePercentage }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Footer -->
    <footer class="py-8 mt-12 text-center bg-white">
        <p class="text-sm text-gray-600">© 2025 SPCC eVoting System. Results update in real-time.</p>
    </footer>

</body>
</html>
