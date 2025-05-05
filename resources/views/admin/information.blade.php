<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voting Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Navigation Bar -->
    <nav class="p-4 bg-blue-600 shadow-md">
        <div class="container mx-auto">
            <ul class="flex space-x-8 font-semibold text-white">
                <li><a href="{{ route('voter.dashboard') }}" class="hover:text-gray-200">Dashboard</a></li>
                <li><a href="{{ route('voter.nominees') }}" class="hover:text-gray-200">Nominees</a></li>
                <li><a href="{{ route('vote') }}" class="hover:text-gray-200">Vote</a></li>
            </ul>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container px-4 py-8 mx-auto max-w-7xl">

        <!-- Title Section -->
        <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">Voting Information</h1>

        <!-- Voting Status -->
        <div class="p-6 mb-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-semibold text-gray-800">Voting Status</h2>
            <p class="mt-2 text-xl text-gray-600">Voting is currently:
                <span class="text-{{ $status == 'Open' ? 'green' : 'red' }}-500 font-semibold">{{ $status }}</span>
            </p>
        </div>

        <!-- Voter Statistics -->
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Total Voters</h3>
                <p class="mt-2 text-3xl font-bold text-gray-600">{{ $totalVoters }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Voted</h3>
                <p class="mt-2 text-3xl font-bold text-gray-600">{{ $voted }}</p>
            </div>
            <div class="p-6 bg-white rounded-lg shadow-lg">
                <h3 class="text-xl font-semibold text-gray-800">Not Voted</h3>
                <p class="mt-2 text-3xl font-bold text-gray-600">{{ $notVoted }}</p>
            </div>
            <a href="{{ route('admin.information.export') }}" class="px-4 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700">
                Export to PDF
            </a>
        </div>

        <!-- Results Section -->
        <div class="mt-8">
            <h2 class="mb-4 text-3xl font-semibold text-gray-800">Election Results</h2>
            @foreach ($results->groupBy('position') as $position => $resultsByPosition)
                <div class="mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $position }}</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach ($resultsByPosition as $result)
                            <div class="max-w-sm overflow-hidden bg-white rounded-lg shadow-lg">
                                <div class="flex justify-center p-6">
                                    <img src="{{ asset('storage/'.$result->nominee->image) }}" alt="Nominee Image" class="object-cover w-24 h-24 border-4 border-blue-600 rounded-full">
                                </div>

                                <div class="p-6">
                                    <h4 class="text-xl font-semibold text-gray-800">{{ $result->nominee->first_name }} {{ $result->nominee->last_name }}</h4>
                                    <p class="mt-2 text-lg text-gray-600">{{ $result->nominee->partylist }}</p>
                                    <p class="mt-4 text-lg font-semibold text-gray-600">Votes: {{ $result->count }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</body>

</html>
