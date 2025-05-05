<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter - Vote</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.4/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <!-- Navigation -->
    <nav class="p-4 bg-blue-600">
        <ul class="flex space-x-4 text-white">
            <li><a href="{{ route('voter.dashboard') }}">Dashboard</a></li>
            <li><a href="{{ route('voter.nominees') }}">Nominees</a></li>
            <li><a href="{{ route('vote') }}">Vote</a></li>
        </ul>
    </nav>

    <!-- Main Content -->
    <div class="container px-4 py-6 mx-auto">
        <h1 class="mb-6 text-3xl font-bold">Cast Your Vote</h1>

        @if (session('success'))
            <div class="p-4 mb-4 text-green-800 bg-green-200 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="p-4 mb-4 text-red-800 bg-red-200 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('vote.store') }}" method="POST" class="space-y-6">
            @csrf

            @foreach ($nominees as $position => $candidates)
                <div class="p-4 bg-white rounded shadow">
                    <h2 class="mb-4 text-xl font-semibold">{{ $position }}</h2>

                    <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                        @foreach ($candidates as $nominee)
                            <label class="flex items-center p-3 space-x-4 bg-gray-100 rounded cursor-pointer">
                                <input type="radio"
                                    name="vote[{{ $position }}][nominee_id]"
                                    value="{{ $nominee->id }}"
                                    class="w-5 h-5 text-blue-600" required>
                                <img src="{{ asset('storage/'.$nominee->image) }}"
                                    alt="Nominee Image" class="object-cover w-16 h-16 rounded-full">
                                <div>
                                    <div class="font-bold">{{ $nominee->first_name }} {{ $nominee->last_name }}</div>
                                    <div class="text-sm text-gray-600">{{ $nominee->partylist }}</div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <!-- Hidden input for position (to match validation) -->
                    <input type="hidden" name="vote[{{ $position }}][position]" value="{{ $position }}">
                </div>
            @endforeach

            <div class="text-center">
                <button type="submit" class="px-6 py-2 mt-6 text-white bg-blue-600 rounded hover:bg-blue-700">
                    Submit Vote
                </button>
            </div>
        </form>
    </div>

</body>
</html>
