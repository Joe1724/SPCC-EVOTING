<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nominees</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-6xl p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-6 text-3xl font-bold text-center">Nominees List</h1>

        @if($setting && $setting->status == 1)
            <p class="mb-6 font-semibold text-center text-green-600">✅ Voting is **OPEN**</p>
        @else
            <p class="mb-6 font-semibold text-center text-red-600">❌ Voting is **CLOSED**</p>
        @endif

        @foreach ($nominees as $position => $groupedNominees)
            <div class="mb-8">
                <h2 class="mb-4 text-2xl font-bold text-center uppercase">{{ $position }}</h2>

                @php
                    $partylistGroups = $groupedNominees->groupBy('partylist');
                @endphp

                @foreach ($partylistGroups as $partylist => $nomineesByParty)
                    <h3 class="mb-2 text-xl font-semibold text-center text-blue-600">{{ $partylist }}</h3>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-3">
                        @foreach ($nomineesByParty as $nominee)
                            <div class="p-4 bg-white rounded-lg shadow-lg">
                                <img src="{{ asset('storage/' . $nominee->image) }}"
                                     class="object-cover w-full h-40 mb-4 rounded-md"
                                     alt="{{ $nominee->first_name }}">

                                <h3 class="text-lg font-bold text-center">{{ strtoupper($nominee->first_name . ' ' . $nominee->last_name) }}</h3>
                                <p class="text-center text-gray-600">{{ $nominee->course }}</p>
                                <p class="italic text-center text-gray-500">"{{ $nominee->description }}"</p>

                                @if($setting->status == 1)
                                    <form action="{{ route('votes.store') }}" method="POST" class="mt-3 text-center">
                                        @csrf
                                        <input type="hidden" name="nominee_id" value="{{ $nominee->id }}">
                                        <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Vote</button>
                                    </form>
                                @else
                                    <button disabled class="w-full px-4 py-2 mt-3 text-white bg-gray-400 rounded">Voting Closed</button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        @endforeach

    </div>

</body>
</html>
