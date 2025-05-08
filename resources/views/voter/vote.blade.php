@extends('voter.index')

@section('title', 'Voter - Vote')

@section('content')
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

    <form id="voteForm" action="{{ route('vote.store') }}" method="POST" class="space-y-6">
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
            <button type="button" onclick="showModal()" class="px-6 py-2 mt-6 text-white bg-blue-600 rounded hover:bg-blue-700">
                Preview Vote
            </button>
        </div>
    </form>

    <!-- Modal -->
    <div id="voteModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-800 bg-opacity-50">
        <div class="relative p-8 bg-white rounded-lg shadow-lg w-96">
            <!-- Close Button -->
            <button onclick="closeModal()" class="absolute text-gray-600 top-2 right-2">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <h2 class="mb-4 text-xl font-semibold">Confirm Your Vote</h2>

            <div id="voteSummary" class="mb-6">
                <!-- Summary will be populated here -->
            </div>

            <div class="text-center">
                <button onclick="submitVote()" class="px-6 py-2 text-white bg-blue-600 rounded">
                    Confirm Vote
                </button>
            </div>
        </div>
    </div>

    <script>
        // Function to show the modal with the summary of the vote
        function showModal() {
            const voteSummary = document.getElementById("voteSummary");
            const voteForm = document.getElementById("voteForm");
            let summaryHTML = '';

            // Loop through the nominees to generate the summary
            const votePositions = voteForm.querySelectorAll('input[type="radio"]:checked');
            votePositions.forEach(function(radio) {
                const position = radio.name.split('[')[1].split(']')[0];
                const nomineeName = radio.closest('label').querySelector('.font-bold').textContent;
                summaryHTML += `
                    <div class="mb-2">
                        <strong>${position}:</strong> ${nomineeName}
                    </div>
                `;
            });

            voteSummary.innerHTML = summaryHTML;
            document.getElementById("voteModal").classList.remove("hidden");
        }

        // Function to close the modal
        function closeModal() {
            document.getElementById("voteModal").classList.add("hidden");
        }

        // Function to submit the vote form
        function submitVote() {
            document.getElementById("voteForm").submit();
        }
    </script>
@endsection
