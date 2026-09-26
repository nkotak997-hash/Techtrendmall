<form method="GET" action="{{ route('search.result') }}">
    @csrf
    <h2>Get users by ID</h2>

    @if(session('error'))
    <div>{{ session('error') }}</div>
    @endif

    <input type="text" name="user_id" placeholder="Enter User ID" value="{{ old('user_id') }}">
    <input type="submit" value="Submit">
</form>
