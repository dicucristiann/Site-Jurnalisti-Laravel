@extends('layout')

@section('title', 'Home Page')

@section('content')
    <div class="wrapper">
        <h2>Login</h2>
        <p>Please fill in your credentials to login.</p>

        @if($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="post">
            @csrf <!-- Token CSRF pentru securitate -->
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control" value="{{ old('username') }}">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-secondary" value="Login">
            </div>
            <p>Don't have an account? <a href="{{ url('register') }}">Sign up now</a>.</p>
        </form>

    </div>
@endsection
