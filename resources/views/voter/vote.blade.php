@extends('voter.index')

@section('title', 'Cast Your Vote')

@section('content')
    <div class="max-w-5xl mx-auto animate-fadeIn">
        <div class="mb-8">
            <h1 class="mb-2 text-4xl font-bold text-gray-800">Cast Your Vote</h1>
            <p class="text-gray-600">Select your preferred candidate for each position</p>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                <svg class="inline w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                <svg class="inline w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/></svg>
                {{ session('error') }}
            </div>
        @endif

        <form id="voteForm" action="{{ route('vote.store') }}" method="POST" class="space-y-8">
            @csrf

            @foreach ($nominees as $position => $candidates)
                <div class="overflow-hidden transition-all duration-300 bg-white shadow-soft rounded-2xl hover:shadow-soft-lg">
                    <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-blue-50 to-white">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $position }}</h2>
                        <p class="text-sm text-gray-500">Select one candidate</p>
                    </div>

                    <div class="grid grid-cols-1 gap-4 p-6 md:grid-cols-2">
                        @foreach ($candidates as $nominee)
                            <label class="relative flex items-center p-4 space-x-4 transition-all duration-300 border-2 border-gray-200 cursor-pointer group rounded-xl hover:border-blue-500 hover:shadow-md hover:scale-[1.02] has-[:checked]:border-blue-600 has-[:checked]:bg-blue-50">
                                <input type="radio"
                                    name="vote[{{ $position }}][nominee_id]"
                                    value="{{ $nominee->id }}"
                                    class="w-5 h-5 text-blue-600 transition-all duration-200 focus:ring-4 focus:ring-blue-300" required>
                                
                                <img src="{{ asset('storage/'.$nominee->image) }}"
                                    alt="{{ $nominee->first_name }} {{ $nominee->last_name }}" 
                                    class="object-cover w-20 h-20 transition-transform duration-300 border-4 border-white rounded-full shadow-md group-hover:scale-110">
                                
                                <div class="flex-1">
                                    <div class="text-lg font-bold text-gray-800">{{ $nominee->first_name }} {{ $nominee->last_name }}</div>
                                    <div class="inline-flex items-center gap-1 px-2 py-1 mt-1 text-xs font-semibold text-blue-700 bg-blue-100 rounded-full">
                                        <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/></svg>
                                        {{ $nominee->partylist }}
                                    </div>
                                </div>

                                <!-- Selected Indicator -->
                                <div class="absolute hidden top-2 right-2 group-has-[:checked]:block">
                                    <div class="flex items-center justify-center w-6 h-6 text-white bg-blue-600 rounded-full">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    </div>
                                </div>
                            </label>
                        @endforeach
                    </div>

                    <input type="hidden" name="vote[{{ $position }}][position]" value="{{ $position }}">
                </div>
            @endforeach

            <div class="sticky bottom-0 z-10 p-6 text-center bg-white border-t border-gray-200 shadow-soft-lg rounded-2xl">
                <button type="button" onclick="showModal()" class="px-12 py-4 text-lg btn btn-primary">
                    Preview & Submit Vote →
                </button>
            </div>
        </form>
    </div>

    <!-- Modal -->
    <div id="voteModal" class="hidden modal-overlay">
        <div class="relative w-full max-w-lg p-8 mx-4 bg-white modal-content rounded-2xl shadow-2xl">
            <!-- Close Button -->
            <button onclick="closeModal()" class="absolute text-gray-400 transition-colors top-4 right-4 hover:text-gray-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            <div class="mb-6 text-center">
                <div class="flex items-center justify-center w-16 h-16 mx-auto mb-4 bg-blue-100 rounded-full">
                    <svg class="w-8 h-8 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <h2 class="text-2xl font-bold text-gray-800">Confirm Your Vote</h2>
                <p class="mt-2 text-sm text-gray-500">Please review your selections before submitting</p>
            </div>

            <div id="voteSummary" class="p-4 mb-6 space-y-3 overflow-y-auto bg-gray-50 rounded-xl max-h-96">
                <!-- Summary will be populated here -->
            </div>

            <div class="flex gap-3">
                <button onclick="closeModal()" class="flex-1 btn btn-secondary">
                    Go Back
                </button>
                <button onclick="submitVote()" class="flex-1 btn btn-primary">
                    Confirm Vote ✓
                </button>
            </div>
        </div>
    </div>

    <script>
        function showModal() {
            const voteSummary = document.getElementById("voteSummary");
            const voteForm = document.getElementById("voteForm");
            let summaryHTML = '';

            const votePositions = voteForm.querySelectorAll('input[type="radio"]:checked');
            
            if (votePositions.length === 0) {
                alert('Please select at least one candidate before previewing.');
                return;
            }

            votePositions.forEach(function(radio) {
                const position = radio.name.split('[')[1].split(']')[0];
                const nomineeName = radio.closest('label').querySelector('.text-lg').textContent;
                const partylistElement = radio.closest('label').querySelector('.text-blue-700');
                const partylist = partylistElement ? partylistElement.textContent.trim() : '';
                
                summaryHTML += `
                    <div class="flex items-center justify-between p-3 bg-white rounded-lg shadow-sm">
                        <div>
                            <div class="text-xs font-semibold text-gray-500 uppercase">${position}</div>
                            <div class="font-bold text-gray-800">${nomineeName}</div>
                            <div class="text-xs text-blue-600">${partylist}</div>
                        </div>
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    </div>
                `;
            });

            voteSummary.innerHTML = summaryHTML;
            const modal = document.getElementById("voteModal");
            const modalContent = modal.querySelector('.modal-content');
            modal.classList.remove("hidden");
            setTimeout(() => modalContent.classList.add('show'), 10);
        }

        function closeModal() {
            const modal = document.getElementById("voteModal");
            const modalContent = modal.querySelector('.modal-content');
            modalContent.classList.remove('show');
            setTimeout(() => modal.classList.add("hidden"), 300);
        }

        function submitVote() {
            document.getElementById("voteForm").submit();
        }
    </script>
@endsection
