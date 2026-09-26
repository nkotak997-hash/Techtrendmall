@if($results->isNotEmpty())
    <ul>
        @foreach($results as $result)
            <li>{{ $result->name }}</li>
        @endforeach
    </ul>
@else
    <p>No results found.</p>
@endif
