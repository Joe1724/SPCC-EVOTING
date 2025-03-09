<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote</title>
</head>
<body>
    <h2>Vote for Candidates</h2>
    <form action="{{ route('vote') }}" method="POST">
        @csrf
        @foreach ($positions as $position)
            <h3>{{ $position->name }}</h3>
            @foreach ($position->nominees as $nominee)
                <input type="radio" name="vote[{{ $position->id }}][nominee_id]" value="{{ $nominee->id }}" required>
                {{ $nominee->name }}<br>
            @endforeach
        @endforeach
        <button type="submit">Submit Vote</button>
    </form>
</body>
</html>
