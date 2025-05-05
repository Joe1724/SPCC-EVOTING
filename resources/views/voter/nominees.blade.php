<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter - Nominees</title>
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
        <h1 class="mb-8 text-4xl font-bold text-center text-gray-800">Meet the Nominees</h1>

        <!-- Grouped Nominees by Position -->
        @foreach ($nominees->groupBy('position') as $position => $nomineesByPosition)
            <div class="mt-8">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">{{ $position }}</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($nomineesByPosition as $nominee)
                        <div class="max-w-sm overflow-hidden bg-white rounded-lg shadow-lg">
                            <div class="flex justify-center p-6">
                                <img src="{{ asset('storage/'.$nominee->image) }}"
                                     alt="Nominee Image"
                                     class="object-cover w-24 h-24 border-4 border-blue-600 rounded-full">
                            </div>

                            <div class="p-6">
                                <h2 class="text-2xl font-semibold text-gray-800">{{ $nominee->first_name }} {{ $nominee->last_name }}</h2>
                                <p class="mt-2 text-lg text-gray-600">{{ $nominee->partylist }}</p>

                                <div class="flex items-center justify-between mt-4">
                                    <!-- Trigger Modal Button -->
                                    <button
                                        class="px-4 py-2 text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700"
                                        onclick="openModal({{ $nominee->id }})">
                                        View Profile
                                    </button>
                                    <span class="text-sm text-gray-500">Votes: {{ $nominee->votes_count ?? '' }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div id="modal-{{ $nominee->id }}" class="fixed inset-0 flex items-center justify-center hidden bg-black bg-opacity-50">
                            <div class="w-11/12 p-6 bg-white rounded-lg shadow-lg md:w-1/3">
                                <div class="flex justify-end">
                                    <button onclick="closeModal({{ $nominee->id }})" class="text-xl font-bold text-gray-600">&times;</button>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('storage/'.$nominee->image) }}" alt="Nominee Image" class="object-cover w-32 h-32 mx-auto border-4 border-blue-600 rounded-full">
                                    <h2 class="mt-4 text-3xl font-semibold">{{ $nominee->first_name }} {{ $nominee->last_name }}</h2>
                                    <p class="mt-2 text-lg text-gray-600">{{ $nominee->partylist }}</p>
                                    <p class="mt-4 text-sm text-gray-500">{{ $nominee->description ?? 'No description available.' }}</p>
                                    <p class="mt-4 text-sm text-gray-500">Position: {{ $nominee->position }}</p>
                                    <p class="mt-2 text-sm text-gray-500">Votes: {{ $nominee->votes_count ?? '0' }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        @endforeach

        <!-- Pagination Section (if needed) -->
        <div class="mt-8">
            <div class="flex items-center justify-between">
                <p class="text-sm text-gray-600">Showing all nominees</p>
                <div>
                    <!-- Pagination buttons (If necessary) -->
                    <button class="px-4 py-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Previous</button>
                    <button class="px-4 py-2 ml-2 text-white transition duration-300 bg-blue-500 rounded-lg hover:bg-blue-600">Next</button>
                </div>
            </div>
        </div>

    </div>

    <!-- Scripts to handle Modal functionality -->
    <script>
        // Open Modal
        function openModal(nomineeId) {
            document.getElementById('modal-' + nomineeId).classList.remove('hidden');
        }

        // Close Modal
        function closeModal(nomineeId) {
            document.getElementById('modal-' + nomineeId).classList.add('hidden');
        }
    </script>

</body>

</html>
