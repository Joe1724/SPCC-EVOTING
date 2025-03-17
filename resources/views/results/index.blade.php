<h1>Election Results</h1>
@foreach ($results as $nominee)
    <p>{{ $nominee->name }} - {{ $nominee->votes_count }} votes</p>
@endforeach
