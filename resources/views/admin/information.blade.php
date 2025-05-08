@extends('admin.dashboard')

@section('title', 'Information')

@section('content')
    <h1 class="mb-8 text-4xl font-bold text-gray-800">Election Information</h1>

    <div class="grid grid-cols-1 gap-8 lg:grid-cols-3">

        <!-- Voting Status -->
        <div class="col-span-1 p-6 bg-white rounded-lg shadow-lg lg:col-span-3">
            <h2 class="text-2xl font-semibold text-gray-800">Voting Status</h2>
            <p class="mt-2 text-2xl text-gray-600">
                Voting is currently:
                <span class="text-{{ $status == 'Open' ? 'green' : 'red' }}-500 font-semibold">{{ $status }}</span>
            </p>
        </div>

        <!-- Voter Stats -->
        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">Total Voters</h3>
            <p class="mt-2 text-4xl font-bold text-gray-600">{{ $totalVoters }}</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">Voted</h3>
            <p class="mt-2 text-4xl font-bold text-gray-600">{{ $voted }}</p>
        </div>

        <div class="p-6 bg-white rounded-lg shadow-lg">
            <h3 class="text-xl font-semibold text-gray-800">Not Voted</h3>
            <p class="mt-2 text-4xl font-bold text-gray-600">{{ $notVoted }}</p>
        </div>

        <!-- Export Button -->
        <div class="col-span-1 lg:col-span-3">
            <a href="{{ route('admin.information.export') }}" class="inline-block px-6 py-3 mt-4 text-white transition duration-300 ease-in-out transform rounded-lg shadow-md bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 hover:scale-105">
                Export to PDF
            </a>
        </div>

        <!-- Results -->
        <div class="col-span-1 mt-10 lg:col-span-3">
            <h2 class="mb-6 text-2xl font-semibold text-gray-800">Election Results</h2>
            @foreach ($results->groupBy('position') as $position => $resultsByPosition)
                <div class="mb-8">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $position }}</h3>
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                        @foreach ($resultsByPosition as $result)
                            <div class="max-w-sm overflow-hidden transition-transform transform bg-white rounded-lg shadow-lg hover:scale-105 hover:shadow-xl">
                                <div class="flex justify-center p-6">
                                    <img src="{{ asset('storage/'.$result->nominee->image) }}"
                                         alt="Nominee Image"
                                         class="object-cover w-24 h-24 border-4 border-blue-600 rounded-full">
                                </div>
                                <div class="p-6">
                                    <h4 class="text-xl font-semibold text-gray-800">
                                        {{ $result->nominee->first_name }} {{ $result->nominee->last_name }}
                                    </h4>
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
@endsection
