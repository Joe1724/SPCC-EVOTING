<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-100">

    <div class="max-w-lg p-6 mx-auto bg-white rounded-lg shadow-md">
        <h1 class="mb-4 text-2xl font-bold">Vote for a Nominee</h1>

        <form action="{{ route('votes.store') }}" method="POST">
            @csrf

            <label class="block font-bold">Election</label>
            <select name="election_id" class="w-full p-2 mb-4 border rounded" required>
                @foreach ($elections as $election)
                    <option value="{{ $election->id }}">{{ $election->name }}</option>
                @endforeach
            </select>

            <label class="block font-bold">Nominee</label>
            <select name="nominee_id" class="w-full p-2 mb-4 border rounded" required>
                @foreach ($nominees as $nominee)
                    <option value="{{ $nominee->id }}">{{ $nominee->name }}</option>
                @endforeach
            </select>

            <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded">Vote</button>
            <a href="{{ route('votes.index') }}" class="px-4 py-2 text-white bg-gray-500 rounded">Back</a>
        </form>
    </div>

</body>
</html>
