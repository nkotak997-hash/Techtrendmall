@extends('layout')

@section('content')

<div class="container">
    <h2>Change Password</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('change.password') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="current_password">Current Password</label>
            <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
            @error('current_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="new_password">New Password</label>
            <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror">
            @error('new_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm New Password</label>
            <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required>
            @error('confirm_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

<br>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
</div>
@endsection
