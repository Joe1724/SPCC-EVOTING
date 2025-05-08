@extends('voter.index')

@section('content')

<div class="flex min-h-screen bg-gray-100">

    <!-- Main Content Area -->
    <div class="flex flex-col items-center flex-1 p-8">
        <h1 class="mb-auto text-4xl font-bold text-center text-gray-800">Meet the Nominees</h1>

        <!-- Grouped Nominees by Position -->
        @foreach ($nominees->groupBy('position') as $position => $nomineesByPosition)
            <div class="w-full max-w-6xl mt-8">
                <h2 class="mb-4 text-3xl font-bold text-gray-800">{{ $position }}</h2>
                <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($nomineesByPosition as $nominee)
                        <div class="max-w-sm overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105">
                            <div class="flex justify-center p-6">
                                <img src="{{ asset('storage/'.$nominee->image) }}" alt="Nominee Image" class="object-cover w-24 h-24 border-4 border-blue-600 rounded-full">
                            </div>

                            <div class="p-6">
                                <h2 class="text-2xl font-semibold text-gray-800">{{ $nominee->first_name }} {{ $nominee->last_name }}</h2>
                                <p class="mt-2 text-lg text-gray-600">{{ $nominee->partylist }}</p>

                                <div class="flex items-center justify-between mt-4">
                                    <!-- Trigger Modal Button -->
                                    <button class="px-4 py-2 text-white transition duration-300 bg-blue-600 rounded-lg hover:bg-blue-700" data-modal-toggle="modal-{{ $nominee->id }}">
                                        View Profile
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Flowbite Modal -->
                        <div id="modal-{{ $nominee->id }}" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black bg-opacity-50">
                            <div class="w-11/12 p-6 bg-white rounded-lg shadow-lg md:w-1/3">
                                <div class="flex justify-end">
                                    <button data-modal-toggle="modal-{{ $nominee->id }}" class="text-xl font-bold text-gray-600">&times;</button>
                                </div>
                                <div class="text-center">
                                    <img src="{{ asset('storage/'.$nominee->image) }}" alt="Nominee Image" class="object-cover w-32 h-32 mx-auto border-4 border-blue-600 rounded-full">
                                    <h2 class="mt-4 text-3xl font-semibold">{{ $nominee->first_name }} {{ $nominee->last_name }}</h2>
                                    <p class="mt-2 text-lg text-gray-600">{{ $nominee->partylist }}</p>
                                    <p class="mt-4 text-sm text-gray-500">{{ $nominee->description ?? 'No description available.' }}</p>
                                    <p class="mt-4 text-sm text-gray-500">Position: {{ $nominee->position }}</p>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        @endforeach

    </div>

</div>

<!-- Flowbite Modal Scripts -->
<script>
    const modalToggleButtons = document.querySelectorAll('[data-modal-toggle]');
    modalToggleButtons.forEach(button => {
        button.addEventListener('click', () => {
            const targetModal = document.getElementById(button.getAttribute('data-modal-toggle'));
            targetModal.classList.toggle('hidden');
        });
    });
</script>

@endsection
